<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Continents;
use Illuminate\Http\Request;
use DataTables;

class CountryController extends Controller
{
    public function data(){
        $countries = Country::all();
        return DataTables::of($countries)
            ->editColumn('continent', function ($country) {
                $continent = Continents::find($country->continent_id);
                return $continent->name;
            })
            ->addColumn('actions', function ($country) {
                return view('admins.countries.action', ['country' => $country]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function index(){
        return view('admins.countries.index');
    }

    public function create(){
        $continents = Continents::all();
        return view('admins.countries.create', compact('continents'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'continent_id' => 'required',
            'name' => 'required',
            'abbr' =>'required'
        ]);

        $country = new Country();
        $country->name = $request->name;
        $country->abbr = $request->abbr;
        $country->continent_id = $request->continent_id;
        //$country->remarks = $request->remarks;
        $country->save();

        return redirect()->route('admin-countries.index')->with('message', 'New Country created successfully!');
    }

    public function show(Country $country){
        //
    }

    public function edit(Country $country, $id){
        $country = Country::find($id);
        $continents = Continents::all();
        return view('admins.countries.edit', ['country' => $country, 'continents' => $continents]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'continent_id' => 'required',
            'name' => 'required',
            'abbr' =>'required'
        ]);

        $country = Country::find($id);
        $country->name = $request->name;
        $country->abbr = $request->abbr;
        $country->continent_id = $request->continent_id;
        //$country->remarks = $request->remarks;
        $country->save();

        return redirect()->route('admin-countries.index')->with('message', 'Country updated successfully!');
    }

    public function destroy(Country $country, $id){
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('admin-countries.index')->with('message', 'Country deleted successfully!');
    }
}
