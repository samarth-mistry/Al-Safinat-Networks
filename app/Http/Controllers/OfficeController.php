<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Country;
use App\Models\City;
use DataTables;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function data()
    {
        //work under progress
        $bookings = Booking::all();
        return DataTables::of($bookings)
            ->editColumn('unit_size', function ($booking) {
                return $booking->unit_size == 0 ? "TEU" : "FEU";
            })
            ->editColumn('source_port', function ($booking) {
                return "El Sheikh Al-Arabi, UAE";
            })
            ->editColumn('s_date_arrival', function ($booking) {
                return $booking->s_date_of_arrival;
            })
            ->editColumn('destination_port', function ($booking) {
                return "Jawaharlal Nehru, Gujarat";
            })
            ->editColumn('dimentions', function ($booking) {
                return $booking->weight.' kg, ['.$booking->d_l.' x '.$booking->d_w.' x '.$booking->d_h.'] m';
            })
            ->addColumn('actions', function ($booking) {
                return view('clients.bookings.action', ['booking' => $booking]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.offices.index');
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        return view('admins.offices.create', compact('countries', 'cities'));
    }

    public function store(Request $request)
    {
        dd($request);
        $this->validate($request, [
            'owner_name' => 'required|min:3',
            'proof_id' => 'required|min:3|max:50',
            'country_id' => 'required',
            'source_address' => 'required',
            'source_email' => 'required',
            'source_phone' => 'required',
            'source_country_id' => 'required',
            's_date_of_arrival' => 'required',
            'material_type_id' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'destination_country_id' => 'required',
            'destination_port_id' => 'required',
            'destination_address' => 'required',
        ]);
        $booking = new Booking();
        $booking->is_own = $request->is_own == "on" ? 1 : 0;
        $booking->owner_name = $request->owner_name;
        $booking->proof_id = $request->proof_id;
        $booking->country_id = $request->country_id;
        $booking->source_address = $request->source_address;
        $booking->source_email = $request->source_email;
        $booking->source_phone = $request->source_phone;
        $booking->unit_size = $request->unit_size;
        $booking->source_country_id = $request->source_country_id;
        $booking->source_port_id = $request->source_port_id;
        $booking->s_date_of_arrival = $request->s_date_of_arrival;
        $booking->material_type_id = $request->material_type_id;
        $booking->weight = $request->weight;
        $booking->d_l = $request->length;
        $booking->d_w = $request->width;
        $booking->d_h = $request->height;
        $booking->sensitivity = $request->sensitivity == "on" ? 1 : 0;
        $booking->destination_country_id = $request->destination_country_id;
        $booking->destination_port_id = $request->destination_port_id;
        $booking->destination_address = $request->destination_address;
        $booking->save();

        return redirect()->route('client-booking.index')->with('message', 'New Booking created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }
}
