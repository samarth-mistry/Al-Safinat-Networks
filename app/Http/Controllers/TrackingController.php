<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Office;
use App\Models\Batch;
use App\Models\Vessel;
use App\Models\VesselRoute;
use App\Models\Tracking;
use Illuminate\Http\Request;
use DataTables;

class TrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator|portadministrator');
    }

    public function inComingData(Request $request, $port_id = 0)
    {
        $trackings = array();
        if($port_id != 0){
            $trackings = Tracking::where([['next_port_id', $port_id],['status','=','travelling']])
                        ->orWhere([['curr_port_id', $port_id],['status','=','travelling']])->get();
            //dd($trackings);
        } else {
            //$trackings = Tracking::where('status', 'deported')->orWhere('status', 'waiting')->get();
            $trackings = Tracking::where('status','!=','delivered')->get();
        }
        return DataTables::of($trackings)
            ->editColumn('name', function ($tracking) {
                return "-";
            })
            ->editColumn('curr_port', function ($tracking) {
                $port = Office::find($tracking->curr_port_id);
                if($tracking->status == 'deported')
                    return $port->name.'&nbsp;&nbsp;<span class="badge badge-success"><i class="fa fa-check"></i></span>';
                
                return $port->name;
            })
            ->editColumn('next_port', function ($tracking) {
                $port = Office::find($tracking->next_port_id);
                if($tracking->status == 'deported')
                    return $port->name.'&nbsp;&nbsp;<span class="badge badge-success"><i class="fa fa-check"></i></span>';
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
                if($tracking->status == 'deported')
                    return '<span class="badge badge-success">'.ucfirst($tracking->status).'</span>';
                else
                    return '<span class="badge badge-warning">'.ucfirst($tracking->status).'</span>';
            })
            ->editColumn('time', function ($tracking) {
                return date('d-M-Y', strtotime($tracking->created_at));
            })
            ->addColumn('actions', function ($tracking) use ($port_id) {
                if($port_id != 0){
                    return view('subadmins.entries.action', ['tracking' => $tracking, 'table_type' => 0]);
                } else {
                    return view('admins.global_trackings.action', ['tracking' => $tracking, 'table_type' => 0]);
                }
                return view('subadmins.entries.action', ['tracking' => $tracking, 'table_type' => 0]);
            })
            ->escapeColumns('curr_port')
            ->escapeColumns('next_port')
            ->escapeColumns('status')
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function outGoingData(Request $request, $port_id = 0)
    {
        $trackings = array();
        if($port_id != 0){
            //$trackings = Tracking::where('status', 'ported')->where('next_port_id', $port_id)->get();
            $trackings = Tracking::where([['next_port_id', $port_id],['status','=','ported']])
                        ->orWhere([['curr_port_id', $port_id],['status','=','OOS']])->get();
        } else {
            $trackings = Tracking::where('status', 'ported')->get();
        }
        return DataTables::of($trackings)
            ->editColumn('name', function ($tracking) {
                return "-";
            })
            ->editColumn('curr_port', function ($tracking) {
                $port = Office::find($tracking->curr_port_id);
                if($tracking->status == 'ported')
                    return $port->name.'&nbsp;&nbsp;<span class="badge badge-success"><i class="fa fa-check"></i></span>';
                return $port->name;
            })
            ->editColumn('next_port', function ($tracking) {
                $port = Office::find($tracking->next_port_id);
                if($tracking->status == 'ported')
                    return $port->name.'&nbsp;&nbsp;<span class="badge badge-warning"><i class="fa fa-clock"></i></span>';
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
                if($tracking->status == 'OOS'){
                    return '<span class="badge badge-danger">'.ucfirst($tracking->status).'</span>';
                } else {
                    return '<span class="badge badge-primary">'.ucfirst($tracking->status).'</span>';
                }
            })
            ->editColumn('time', function ($tracking) {
                return date('d-M-Y', strtotime($tracking->created_at));
            })
            ->addColumn('actions', function ($tracking) use ($port_id) {
                if($port_id != 0){
                    return view('subadmins.entries.action', ['tracking' => $tracking, 'table_type' => 1]);
                } else {
                    return view('admins.global_trackings.action', ['tracking' => $tracking, 'table_type' => 1]);
                }
            })
            ->escapeColumns('status')
            ->escapeColumns('curr_port')
            ->rawColumns(['actions'])
            ->make(true);
    }
    
    public function index()
    {
        $ports = Office::where('type_id', 0)->get();
        return view('subadmins.entries.index', compact('ports'));
    }

    public function globalTrackingIndex()
    {
        return view('admins.global_trackings.index');
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
        //$route = VesselRoute::where([['from_port', '=', $request->curr_port_id],['vessel_id','=',$request->vessel_id]])->first();
        $vessel = Vessel::find($request->vessel_id);
        //$tracking_id = $vessel->name."-".date('d-m-Y');
        $route_array = array();
        $routes = VesselRoute::where('vessel_id', $vessel->id)->get();
        $index = 0;
        foreach($routes as $route){
            if($index == 0){
                $tracking = new Tracking();
                $tracking->curr_port_id = $route->from_port;
                $tracking->next_port_id = $route->to_port;
                $tracking->vessel_id = $vessel->id;
                $tracking->batch_id = $vessel->batch_id;
                $tracking->status = $request->status;
                $tracking->save();
                $index++;
            } else {
                $tracking = new Tracking();
                $tracking->curr_port_id = $route->from_port;
                $tracking->next_port_id = $route->to_port;
                $tracking->vessel_id = $vessel->id;
                $tracking->batch_id = $vessel->batch_id;
                $tracking->status = 'waiting';
                $tracking->save();
            }
        }

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
        $route = VesselRoute::where([['from_port', '=', $request->curr_port_id],['vessel_id','=',$request->vessel_id]])->first();
        $vessel = Vessel::find($request->vessel_id);
        $tracking = Tracking::find($id);
        $tracking->curr_port_id = $request->curr_port_id;
        $tracking->next_port_id = $route->to_port;
        $tracking->vessel_id = $request->vessel_id;
        $tracking->batch_id = $vessel->batch_id;
        $tracking->status = $request->status;
        $tracking->save();

        return redirect()->route('admin-trackings.index')->with('message', 'Entry updated successfully!');
    }

    public function destroy(Tracking $tracking)
    {
        //
    }

    public function setStatusPorted($id, $is_global=0)
    {
        //dd('st');
        $tracking = Tracking::find($id);
        $last_port_tracking = Tracking::where('vessel_id', $tracking->vessel_id)->where('status', '!=', 'delivered')->orderBy('id', 'desc')->first();

        if($tracking == $last_port_tracking){
            $trackings = Tracking::where('vessel_id', $tracking->vessel_id)->where('status', '!=', 'delivered')->update(['status' => 'delivered']);
        } else {
            $tracking->status = 'ported';
            $tracking->save();
        }

        if($is_global == 0){
            return redirect()->route('admin-trackings.index')->with('message', 'Data updated successfully!');
        } else {
            return redirect()->route('admin-global-traffic')->with('message', 'Data updated successfully!');
        }
    }

    public function setStatusDeported($id, $is_global=0)
    {
        $tracking = Tracking::find($id);
        if($tracking->status == 'OOS'){
            $tracking->status = 'travelling';
            $tracking->save();
        } else {
            $tracking->status = 'deported';
            $tracking->save();

            $tracking = Tracking::find($id+1);
            $tracking->status = 'travelling';
            $tracking->save();
        }

        if($is_global == 0){
            return redirect()->route('admin-trackings.index')->with('message', 'Data updated successfully!');
        } else {
            return redirect()->route('admin-global-traffic')->with('message', 'Data updated successfully!');
        }
    }

    public function deliveredBatchesData()
    {
        $trackings_data = Tracking::where('status', 'delivered')->get();
        $batch_mark = 0;
        $trackings = array();
        foreach($trackings_data as $ent){
            if($batch_mark != $ent->batch_id){
                $batch_mark = $ent->batch_id;
                array_push($trackings, $ent);
            }
        }
        //dd($trackings);
        return DataTables::of($trackings)
            ->editColumn('batch', function ($tracking) {
                $batch = Batch::find($tracking->batch_id);
                return $batch->name;
            })
            ->editColumn('vessel', function ($tracking) {
                $batch = Vessel::find($tracking->vessel_id);
                return $batch->name;
                
            })
            ->editColumn('origin_port', function ($tracking) {
                $track = Tracking::where([
                    ['vessel_id','=',$tracking->vessel_id],
                    ['batch_id','=',$tracking->batch_id],
                    ['status','=','delivered']
                ])->first();
                $port = Office::find($track->curr_port_id);
                return ' <span class="badge badge-secondary">['.date('d M Y', strtotime($track->created_at)).']</span>&nbsp;&nbsp;'.$port->name;
            })
            ->editColumn('dest_port', function ($tracking) {
                $track = Tracking::where([
                    ['vessel_id','=',$tracking->vessel_id],
                    ['batch_id','=',$tracking->batch_id],
                    ['status','=','delivered']
                ])->orderBy('id','desc')->first();
                $port = Office::find($track->next_port_id);
                return '<span class="badge badge-secondary">['.date('d M Y', strtotime($track->updated_at)).']</span>&nbsp;&nbsp;'.$port->name;
            })
            ->editColumn('time_taken', function ($tracking) {
                $track1 = Tracking::where([
                    ['vessel_id','=',$tracking->vessel_id],
                    ['batch_id','=',$tracking->batch_id],
                    ['status','=','delivered']
                ])->first();

                $track2 = Tracking::where([
                    ['vessel_id','=',$tracking->vessel_id],
                    ['batch_id','=',$tracking->batch_id],
                    ['status','=','delivered']
                ])->orderBy('id','desc')->first();

                return $track2->updated_at->diffInDays($track1->created_at).' days';
            })
            ->editColumn('status', function ($tracking) {
                return '<span class="badge badge-success">'.ucfirst($tracking->status).'</span>';
            })
            ->editColumn('time', function ($tracking) {
                return date('d-M-Y', strtotime($tracking->created_at));
            })
            ->addColumn('actions', function ($tracking) {
                return view('admins.delivered_batches.action', ['tracking' => $tracking]);
            })
            ->escapeColumns('origin_port')
            ->escapeColumns('dest_port')
            ->escapeColumns('status')
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function deliveredBatchesIndex()
    {
        return view('admins.delivered_batches.index');
    }
}
