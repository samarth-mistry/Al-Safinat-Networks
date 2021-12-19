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
        $routes = VesselRoute::all();
        $dt = DataTables::of($routes);
        $dt->editColumn('vessel', function ($route) {
            $vessel = Vessel::find($route->vessel_id);
            return $vessel->name;
        });
        $dt->editColumn('from', function ($route) {
            $port = Office::find($route->from_port);
            return $port->name;
        });
        $dt->editColumn('via', function ($route) {
            $port = Office::find($route->to_port);
            return $port->name;
        });
        $dt->editColumn('to', function ($route) {
            $port = Office::find($route->to_port);
            return $port->name;
        });
        $dt->addColumn('actions', function ($route) {
            return view('admins.vessel_routes.action', ['route' => $route]);
        });
            // foreach($reservations as $reservation){
            //     $class_summary = ClassDetail::find($reservation->class_id); 
            //     $annualClassTerm = AnnualClassTerm::find($class_summary->annual_id);
            //     for($i=1; $i<=$annualClassTerm->term; $i++) {
            //         $dt->addColumn('VT' . $i, function ($reservation) use ($i) {
            //             $class_summary = ClassDetail::find($reservation->class_id); 
            //             $paymentAdvise = PaymentAdvise::where([['class_id', '=', $class_summary->id], ['annual_id', '=', $class_summary->annual_id], ['term', '=', $i]])->get();
            //             $count = 0;
            //             $last_student = 0;
            //             foreach($paymentAdvise as $ent_no){
            //                 // if($ent_no->student_id != $last_student){
            //                 //     $last_student = $ent_no->student_id;
            //                 //     $count++;
            //                 // }
            //                 if($ent_no->student_id != $last_student){
            //                     $last_student = $ent_no->student_id;
            //                     $stud = Student::find($last_student);
            //                     if($stud->status == 'active'){
            //                         $count++;
            //                     }
            //                 }
            //             }
            //             $reservations = Student::where('status', 'waiting')->where('class_id', $class_summary->id)->count();
            //             return $class_summary->max_size_inperson - $count - $reservations;
            //         });
            //     }
            // }
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
        return view('admins.vessel_routes.edit', compact('vessel'));
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
