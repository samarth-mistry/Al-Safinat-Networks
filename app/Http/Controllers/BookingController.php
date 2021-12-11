<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Country;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function dashboard()
    {
        return view('clients.dashboard');
    }
    public function index()
    {
        return view('clients.bookings.index');
    }

    public function create()
    {
        $schoolCategories = array();
        $schools = array();
        $years = array();
        $levels = array();
        $countries = Country::all();
        return view('clients.bookings.create', compact('schoolCategories','schools','years','levels','countries'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Booking $booking)
    {
        //
    }

    public function edit(Booking $booking)
    {
        //
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
