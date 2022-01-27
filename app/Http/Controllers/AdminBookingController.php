<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use DataTables;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Unit;
use App\Mail\BookingApproved;
use App\Models\Batch;
use App\Models\Country;
use App\Models\Office;

class AdminBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function data()
    {
        $bookings = Booking::all();
        return DataTables::of($bookings)
            ->editColumn('unit_size', function ($booking) {
                return $booking->unit_size == 0 ? "TEU" : "FEU";
            })
            ->editColumn('source_port', function ($booking) {
                $port = Office::find($booking->source_port_id);
                return $port->name;
            })
            ->editColumn('s_date_arrival', function ($booking) {
                return $booking->s_date_of_arrival;
            })
            ->editColumn('destination_port', function ($booking) {
                $port = Office::find($booking->destination_port_id);
                return $port->name;
            })
            ->editColumn('dimentions', function ($booking) {
                return $booking->weight.' kg, ['.$booking->d_l.' x '.$booking->d_w.' x '.$booking->d_h.'] m';
            })
            ->editColumn('status', function ($booking) {
                $bk_unt = DB::table('booking_units')->where('booking_id', $booking->id)->first();
                if($bk_unt->status == 'waiting')
                    return '<span class="badge badge-warning">Waiting</span>';
                elseif($bk_unt->status == 'batched'){
                    $unit = Unit::find($bk_unt->unit_id);
                    return '<span class="badge badge-primary">'.$unit->name.'</span>';
                } else {
                    return '<span class="badge badge-danger">'.ucfirst($bk_unt->status).'</span>';
                }
            })
            ->addColumn('actions', function ($booking) {
                return view('admins.bookings.action', ['booking' => $booking]);
            })
            ->escapeColumns('status')
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.bookings.index');
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return view('admins.bookings.show', compact('booking'));
    }

    public function assignUnit($id)
    {
        $booking = Booking::find($id);
        $bk_unt = DB::table('booking_units')->where('booking_id', $booking->id)->first();
        $units = Unit::all();
        return view('admins.bookings.assign', compact('booking','bk_unt','units'));
    }

    public function updateUnit(Request $request, $id)
    {
        $this->validate($request, [
            'tracking_id' => 'required|min:3',
            'unit_id' => 'required'
        ]);
        $booking = Booking::find($id);
        $booking->tracking_id = $request->tracking_id;
        $booking->save();

        $bk_unt = DB::table('booking_units')
                    ->where('booking_id', $booking->id)
                    ->update([
                        'unit_id' => $request->unit_id,
                        'status' => 'batched'
                    ]);

        $unit = Unit::find($request->unit_id);
        $unit->status = 'queued';
        $unit->save();

        Mail::to($booking->source_email)->send(new BookingApproved($booking, $unit));
        return redirect()->route('admin-bookings.index')->with(['message', 'Unit assigned successfully']);
    }
}
