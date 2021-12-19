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
        // $vessels = Vessel::where('id',1)->orWhere('id',2)->get();
        $vessels = Vessel::all();
        $dt = DataTables::of($vessels);

        $dt->editColumn('from', function ($vessel) {
            $vessel_routes = VesselRoute::where('vessel_id', $vessel->id)->orderBy('id', 'ASC')->first();
            $port = Office::find($vessel_routes->from_port);
            return $port->name;
        });
        $dt->editColumn('via', function ($vessel) {
            $counts = VesselRoute::where('vessel_id', $vessel->id)->count();
            $index = $counts/2;
            $vessel_routes = VesselRoute::where('vessel_id', $vessel->id)->orderBy('id', 'DESC')->get();
            $port = Office::find($vessel_routes[$index]->from_port);
            return $port->name;
        });
        $dt->editColumn('to', function ($vessel) {
            $vessel_routes = VesselRoute::where('vessel_id', $vessel->id)->orderBy('id', 'DESC')->first();
            $port = Office::find($vessel_routes->to_port);
            return $port->name;
        });
        $dt->addColumn('actions', function ($vessel) {
            return view('admins.vessel_routes.action', ['route' => $vessel]);
        });
        $dt->rawColumns(['actions']);
        return $dt->make(true);
    }

    public function index()
    {
        return view('admins.vessel_routes.index');
    }

    public function create()
    {
        return view('admins.vessel_routes.create');
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
        $ports = Office::where('type_id', 0)->get();
        return view('admins.vessel_routes.edit', compact('vessel','ports'));
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
