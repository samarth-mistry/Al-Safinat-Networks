<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Office;
use App\Models\Batch;
use App\Models\Vessel;
use App\Models\Tracking;
use Illuminate\Http\Request;
use DataTables;

class TrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    
    public function data()
    {
        $trackings = Tracking::all();
        return DataTables::of($trackings)
            ->editColumn('name', function ($tracking) {
                //return $office->type_id == 0 ? "Port Office" : "Non Port Office";
                return "-";
            })
            ->editColumn('batch', function ($tracking) {
                //$city = City::find($office->city_id);
                //return $city->name;
                return "-";
            })
            ->editColumn('vessel', function ($tracking) {
                //$country = Country::find($tracking->country_id);
                //return $country->name;
                return "-";
            })
            ->editColumn('status', function ($tracking) {
                return ucfirst($tracking->status);
            })
            ->addColumn('actions', function ($tracking) {
                return view('subadmins.entries.action', ['tracking' => $tracking]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    
    public function index()
    {
        return view('subadmins.entries.index');
    }

    public function create()
    {
        $countries = Country::all();
        $vessels = Vessel::all();
        $batches = Batch::all();
        $ports = Office::where('type_id', 0)->get();
        return view('subadmins.entries.create', compact('countries','ports','batches','vessels'));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit(Tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tracking $tracking)
    {
        //
    }
}
