<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Booking;
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
            ->addColumn('actions', function ($booking) {
                return view('admins.bookings.action', ['booking' => $booking]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.bookings.index');
    }
}
