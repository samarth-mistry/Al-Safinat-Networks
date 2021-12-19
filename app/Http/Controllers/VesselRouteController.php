<?php

namespace App\Http\Controllers;

use App\Models\VesselRoute;
use App\Models\Office;
use App\Models\Vessel;
use Illuminate\Http\Request;
use DataTables;

class VesselRouteController extends Controller
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
                return view('admins.vessel-routes.action', ['vessel' => $vessel]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.vessel-routes.index');
    }

    public function create()
    {
        return view('admins.vessel-routes.create');
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

        return redirect()->route('admin-vessel-routes.index')->with('message', 'New Vessel Route created successfully!');
    }

    public function edit($id)
    {
        $vessel = Vessel::find($id);
        return view('admins.vessel-routes.edit', compact('vessel'));
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

        return redirect()->route('admin-vessel-routes.index')->with('message', 'Vessel Route updated successfully!');
    }

    public function destroy($id)
    {
        $vessel = VesselRoute::find($id);
        $vessel->delete();
        return redirect()->route('admin-vessel-routes.index')->with('message', 'Vessel Route deleted successfully!');
    }
    public function show(VesselRoute $vesselRoute)
    {
        //
    }
}
