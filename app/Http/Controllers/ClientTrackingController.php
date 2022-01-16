<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Booking;
use App\Models\Vessel;
use App\Models\VesselRoute;
use App\Models\Office;

class ClientTrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:client');
    }

    public function index()
    {
        return view('clients.trackings.index');
    }

    public function showToClient(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'tracking_id' => 'required|min:3'
        ]);

        $tracking_id = $request->tracking_id;
        $booking = Booking::where('tracking_id', $tracking_id)->first();

        $vessel = Vessel::find(2);
        
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
        return view('clients.trackings.show', compact('tracking_id','booking','route_array'));
    }

    public function streamPdf()
    {
        // $this->validate($request, [
        //     'tracking_id' => 'required|min:3'
        // ]);

        $tracking_id = 'AZIFO';//$request->tracking_id;
        $booking = Booking::where('tracking_id', $tracking_id)->first();

        $vessel = Vessel::find(2);
        
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
        $pdf_url = url(asset('file-system/booking-pdfs/'.str_replace(' ', '_', strtolower($booking->owner_name))."_details.pdf"));

        dd($pdf_url);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('clients.trackings.pdf', compact('tracking_id','booking','route_array'));
        $pdf_path = public_path('file-system/booking-pdfs/'.str_replace(' ', '_', strtolower($booking->owner_name))."_details.pdf");
        $pdf->save($pdf_path, array('Attachment' => 0));
        return $pdf->stream(str_replace(' ', '_', strtolower($booking->owner_name)) . "_details.pdf", array('Attachment' => 0));
    }
}
