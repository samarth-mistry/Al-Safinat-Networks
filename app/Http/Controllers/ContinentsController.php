<?php

namespace App\Http\Controllers;

use App\Models\Continents;
use Illuminate\Http\Request;
use DataTables;

class ContinentsController extends Controller
{
    public function data(){
        $continents = Continents::all();
        return DataTables::of($continents)
            ->addColumn('actions', function ($continent) {
                return view('admins.continents.action', ['continent' => $continent]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function index(){
        //$continents = Continents::all();
        //dd($continents);
        return view('admins.continents.index');
    }

    public function create(){
        return view('admins.continents.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'abbr' =>'required'
        ]);

        $continent = new Continents();
        $continent->name = $request->name;
        $continent->abbr = $request->abbr;
        $continent->coordinates = $request->cords;
        $continent->remarks = $request->remarks;
        $continent->save();

        return redirect()->route('admin-continents.index')->with('message', 'New Continent created successfully!');
    }

    public function show(Continents $continents){
        
    }

    public function edit(Request $request, $id){
        $continent = Continents::find($id);
        return view('admins.continents.edit', ['continent' => $continent]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'abbr' =>'required'
        ]);

        $continent = Continents::find($id);
        $continent->name = $request->name;
        $continent->abbr = $request->abbr;
        $continent->coordinates = $request->cords;
        $continent->remarks = $request->remarks;
        $continent->save();

        return redirect()->route('admin-continents.index')->with('message', 'Continent updated successfully!');
    }

    public function destroy(Continents $continents, $id){
        $continent = Continents::find($id);
        $continent->delete();
        return redirect()->route('admin-continents.index')->with('message', 'Continent deleted successfully!');
    }
}
