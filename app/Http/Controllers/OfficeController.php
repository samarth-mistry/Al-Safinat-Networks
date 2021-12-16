<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Country;
use App\Models\City;
use DataTables;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    
    public function data()
    {
        $offices = Office::all();
        return DataTables::of($offices)
            ->editColumn('type', function ($office) {
                return $office->type_id == 0 ? "Port Office" : "Non Port Office";
            })
            ->editColumn('city', function ($office) {
                $city = City::find($office->city_id);
                return $city->name;
            })
            ->editColumn('country', function ($office) {
                $country = Country::find($office->country_id);
                return $country->name;
            })
            ->addColumn('actions', function ($office) {
                return view('admins.offices.action', ['office' => $office]);
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
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'type_id' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'address' => 'required',
            'email_import' => 'required',
            'email_export' => 'required',
            'phone' => 'required',
            'opening_time' => 'required',
        ]);
        $office = new Office();
        $office->name = $request->name;
        $office->type_id = $request->type_id;
        $office->city_id = $request->city_id;
        $office->country_id = $request->country_id;
        $office->address = $request->address;
        $office->email_import = $request->email_import;
        $office->email_export = $request->email_export;
        $office->phone = $request->phone;
        $office->opening_time = $request->opening_time;
        $office->status = $request->status;
        $office->save();

        return redirect()->route('admin-offices.index')->with('message', 'New Office created successfully!');
    }

    public function show(Office $office)
    {
        //
    }

    public function edit($id)
    {
        $office = Office::find($id);
        $countries = Country::all();
        $cities = City::all();
        return view('admins.offices.edit', compact('countries', 'cities', 'office'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'type_id' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'address' => 'required',
            'email_import' => 'required',
            'email_export' => 'required',
            'phone' => 'required',
            'opening_time' => 'required',
        ]);
        $office = Office::find($id);
        $office->name = $request->name;
        $office->type_id = $request->type_id;
        $office->city_id = $request->city_id;
        $office->country_id = $request->country_id;
        $office->address = $request->address;
        $office->email_import = $request->email_import;
        $office->email_export = $request->email_export;
        $office->phone = $request->phone;
        $office->opening_time = $request->opening_time;
        $office->status = $request->status;
        $office->save();

        return redirect()->route('admin-offices.index')->with('message', 'Office updated successfully!');
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
