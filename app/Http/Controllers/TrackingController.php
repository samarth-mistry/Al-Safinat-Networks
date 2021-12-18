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
                return "-";
            })
            ->editColumn('curr_port', function ($tracking) {
                $port = Office::find($tracking->curr_port_id);
                return $port->name;
            })
            ->editColumn('next_port', function ($tracking) {
                $port = Office::find($tracking->next_port_id);
                return $port->name;
            })
            ->editColumn('batch', function ($tracking) {
                $batch = Batch::find($tracking->batch_id);
                return $batch->name;
            })
            ->editColumn('vessel', function ($tracking) {
                $batch = Vessel::find($tracking->vessel_id);
                return $batch->name;
            })
            ->editColumn('status', function ($tracking) {
                return ucfirst($tracking->status);
            })
            ->editColumn('time', function ($tracking) {
                return date('d-M-Y', strtotime($tracking->created_at));
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
        //dd($request);
        $this->validate($request, [
            'curr_port_id' => 'required',
            'next_port_id' => 'required',
            'vessel_id' => 'required',
            'batch_id' => 'required',
            'status' => 'required'
        ]);
        $tracking = new Tracking();
        $tracking->curr_port_id = $request->curr_port_id;
        $tracking->next_port_id = $request->next_port_id;
        $tracking->vessel_id = $request->vessel_id;
        $tracking->batch_id = $request->batch_id;
        $tracking->status = $request->status;
        $tracking->save();

        return redirect()->route('admin-trackings.index')->with('message', 'Entry created successfully!');
    }

    public function show(Tracking $tracking)
    {
        //
    }

    public function edit($id)
    {
        $tracking = Tracking::find($id);
        $countries = Country::all();
        $curr_port = Office::find($tracking->curr_port_id);
        $next_port = Office::find($tracking->next_port_id);
        //dd($curr_port->country->name);
        //$curr_country = Country::find($curr_port->);
        $vessels = Vessel::all();
        $batches = Batch::all();
        $ports = Office::where('type_id', 0)->get();
        return view('subadmins.entries.edit', compact('tracking','countries','ports','batches','vessels','curr_port','next_port'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'curr_port_id' => 'required',
            'next_port_id' => 'required',
            'vessel_id' => 'required',
            'batch_id' => 'required',
            'status' => 'required'
        ]);
        $tracking = Tracking::find($id);
        $tracking->curr_port_id = $request->curr_port_id;
        $tracking->next_port_id = $request->next_port_id;
        $tracking->vessel_id = $request->vessel_id;
        $tracking->batch_id = $request->batch_id;
        $tracking->status = $request->status;
        $tracking->save();

        return redirect()->route('admin-trackings.index')->with('message', 'Entry updated successfully!');
    }

    public function destroy(Tracking $tracking)
    {
        //
    }
}
