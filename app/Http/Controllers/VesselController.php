<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;
use DataTables;

class VesselController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function data()
    {
        $vessels = Vessel::all();
        return DataTables::of($vessels)
            ->editColumn('status', function ($vessel) {
                return ucfirst($vessel->status);
            })
            ->addColumn('actions', function ($vessel) {
                return view('admins.vessels.action', ['vessel' => $vessel]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.vessels.index');
    }

    public function create()
    {
        return view('admins.vessels.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'max_units' => 'required',
            'status' => 'required'
        ]);
        $vessel = new Vessel();
        $vessel->name = $request->name;
        $vessel->max_units = $request->max_units;
        $vessel->description = $request->description;
        $vessel->status = $request->status;
        $vessel->save();

        return redirect()->route('admin-vessels.index')->with('message', 'New Vessel created successfully!');
    }

    public function show(Vessel $vessel)
    {
        //
    }

    public function edit($id)
    {
        $vessel = Vessel::find($id);
        return view('admins.vessels.edit', compact('vessel'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'max_units' => 'required',
            'status' => 'required'
        ]);
        $vessel = Vessel::find($id);
        $vessel->name = $request->name;
        $vessel->max_units = $request->max_units;
        $vessel->description = $request->description;
        $vessel->status = $request->status;
        $vessel->save();

        return redirect()->route('admin-vessels.index')->with('message', 'Vessel updated successfully!');
    }

    public function destroy($id)
    {
        $vessel = Vessel::find($id);
        $vessel->delete();
        return redirect()->route('admin-vessels.index')->with('message', 'Vessel deleted successfully!');
    }
}
