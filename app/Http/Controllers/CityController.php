<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Continents;
use Illuminate\Http\Request;
use DataTables;

class CityController extends Controller
{
    public function data(){
        $cities = City::all();
        return DataTables::of($cities)
            ->editColumn('country', function ($city) {
                $country = Country::find($city->country_id);
                return $country->name;
            })
            ->editColumn('continent', function ($city) {
                $country = Country::find($city->country_id);
                $continent = Continents::find($country->continent_id);
                return $continent->name;
            })
            ->addColumn('actions', function ($city) {
                return view('admins.cities.action', ['city' => $city]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function index(){
        return view('admins.cities.index');
    }

    public function create(){
        $countries = Country::all();
        return view('admins.cities.create', compact('countries'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'country_id' => 'required',
            'name' => 'required',
            'abbr' =>'required'
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->abbr = $request->abbr;
        $city->country_id = $request->country_id;
        //$city->remarks = $request->remarks;
        $city->save();

        return redirect()->route('admin-cities.index')->with('message', 'New City created successfully!');
    }

    public function show(City $city){
        //
    }

    public function edit(City $city, $id){
        $city = City::find($id);
        $countries = Country::all();
        return view('admins.cities.edit', ['city' => $city, 'countries' => $countries]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'country_id' => 'required',
            'name' => 'required',
            'abbr' =>'required'
        ]);

        $city = City::find($id);
        $city->name = $request->name;
        $city->abbr = $request->abbr;
        $city->country_id = $request->country_id;
        //$city->remarks = $request->remarks;
        $city->save();

        return redirect()->route('admin-cities.index')->with('message', 'City updated successfully!');
    }

    public function destroy($id){
        $city = City::find($id);
        $city->delete();
        return redirect()->route('admin-cities.index')->with('message', 'City deleted successfully!');
    }
}
