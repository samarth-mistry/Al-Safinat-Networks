<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Unit;
use App\Models\Vessel;
use Illuminate\Http\Request;
use DataTables;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function data()
    {
        $batches = Batch::all();
        return DataTables::of($batches)
            ->editColumn('vessel', function ($batch) {
                $vessel = Vessel::find($batch->vessel_id);
                return $vessel->name;
            })
            ->editColumn('from_unit', function ($batch) {
                $unit = Unit::find($batch->from_unit);
                return $unit->name;
            })
            ->editColumn('to_unit', function ($batch) {
                $unit = Unit::find($batch->to_unit);
                return $unit->name;
            })
            ->editColumn('status', function ($batch) {
                return ucfirst($batch->status);
            })
            ->addColumn('actions', function ($batch) {
                return view('admins.batches.action', ['batch' => $batch]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admins.batches.index');
    }

    public function create()
    {
        $units = Unit::where('status', 'ideal')->get();
        $vessels = Vessel::where('status', 'ideal')->get();
        return view('admins.batches.create', compact('units','vessels'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'vessel_id' => 'required',
            'from_unit' => 'required',
            'to_unit' => 'required',
            'status' => 'required'
        ]);
        $batch = new Batch();
        $batch->name = $request->name;
        $batch->vessel_id = $request->vessel_id;
        $batch->from_unit = $request->from_unit;
        $batch->to_unit = $request->to_unit;
        $batch->description = $request->description;
        $batch->status = $request->status;
        $batch->save();

        return redirect()->route('admin-batches.index')->with('message', 'New Batch created successfully!');
    }

    public function show(Batch $batch)
    {
        //
    }

    public function edit($id)
    {
        $batch = Batch::find($id);
        $units = Unit::where('status', 'ideal')->get();
        $vessels = Vessel::where('status', 'ideal')->get();

        return view('admins.batches.edit', compact('units','vessels','batch'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|min:3',
            'vessel_id' => 'required',
            'from_unit' => 'required',
            'to_unit' => 'required',
            'status' => 'required'
        ]);
        $batch = Batch::find($id);
        $batch->name = $request->name;
        $batch->vessel_id = $request->vessel_id;
        $batch->from_unit = $request->from_unit;
        $batch->to_unit = $request->to_unit;
        $batch->description = $request->description;
        $batch->status = $request->status;
        $batch->save();

        return redirect()->route('admin-batches.index')->with('message', 'New Batch created successfully!');
    }

    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        return redirect()->route('admin-batches.index')->with('message', 'Batch deleted successfully!');
    }
}
