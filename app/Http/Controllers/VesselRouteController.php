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
        //return redirect()->route('admin-vessel-routes.index')->with('message', 'New Vessel Route created successfully!');
    }

    public function edit($id)
    {
        $vessel = Vessel::find($id);
        
        $route_array = array();
        $routes = VesselRoute::where('vessel_id', $vessel->id)->get();
        $index = 0;
        foreach($routes as $route){
            if($index == 0){
                $init_port = Office::find($route->from_port);
                $route_array[$index] = $init_port->name;
                $index++;
                $port = Office::find($route->to_port);
                $route_array[$index] = $port->name;
            } else {
                $port = Office::find($route->to_port);
                $route_array[$index] = $port->name;
            }
            $index++;
        }
        $ports = Office::where('type_id', 0)->get();
        return view('admins.vessel_routes.edit', compact('vessel','ports','route_array'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'ports' => 'required'
        ]);

        VesselRoute::where('vessel_id', $id)->delete();

        for($i=0; $i<sizeof($request->ports)-1; $i++){
            $route = new VesselRoute();
            $route->vessel_id = $id;
            $route->from_port = $request->ports[$i]["port_id"];
            $route->to_port = $request->ports[$i+1]["port_id"];
            $route->save();
        }

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
