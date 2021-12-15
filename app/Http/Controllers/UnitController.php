<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Office;
use Illuminate\Http\Request;
use DataTables;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function data()
    {
        $units = Unit::all();
        return DataTables::of($units)
            ->editColumn('type', function ($unit) {
                return $unit->type == 0 ? "TEU" : "FEU";
            })
            ->editColumn('port', function ($unit) {
                $port = Office::find($unit->port_id);
                return $port->name;
            })
            ->editColumn('status', function ($unit) {
                return ucfirst($unit->status);
            })
            ->addColumn('actions', function ($unit) {
                return view('admins.units.action', ['unit' => $unit]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.units.index');
    }

    public function create()
    {
        $ports = Office::where('type_id', 0)->get();
        return view('admins.units.create', compact('ports'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'unit_size' => 'required',
            'port_id' => 'required',
            'max_load' => 'required',
            'status' => 'required'
        ]);
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->unit_size = $request->unit_size;
        $unit->port_id = $request->port_id;
        $unit->max_load = $request->max_load;
        $unit->description = $request->description;
        $unit->status = $request->status;
        $unit->save();

        return redirect()->route('admin-units.index')->with('message', 'New Unit created successfully!');
    }

    public function show(Unit $unit)
    {
        //
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        $ports = Office::where('type_id', 0)->get();
        return view('admins.units.edit', compact('ports', 'unit'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'unit_size' => 'required',
            'port_id' => 'required',
            'max_load' => 'required',
            'status' => 'required'
        ]);
        $unit = Unit::find($id);
        $unit->name = $request->name;
        $unit->unit_size = $request->unit_size;
        $unit->port_id = $request->port_id;
        $unit->max_load = $request->max_load;
        $unit->description = $request->description;
        $unit->status = $request->status;
        $unit->save();

        return redirect()->route('admin-units.index')->with('message', 'Unit updated successfully!');
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->route('admin-units.index')->with('message', 'Unit deleted successfully!');
    }
}
