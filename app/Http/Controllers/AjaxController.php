<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Unit;
use App\Models\Vessel;
use App\Models\VesselRoute;
use App\Models\Office;
use Illuminate\Http\Request;
use DataTables;

class AjaxController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:superadministrator');
    // }
    public function getNextPort(Request $request, $vessel_id, $curr_port_id)
    {
        $route = VesselRoute::where([['from_port', '=', $curr_port_id],['vessel_id','=',$vessel_id]])->first();
        if($route){
            $next_port = $route->toport->name;
            $next_country = $route->toport->country->name;
            return [
                'port' => $next_port,
                'country' => $next_country
            ];
        }
        return [
            'port' => 'Incorrect Route',
            'country' => 'Incorrect Route'
        ];
    }
    public function getPortByCountry(Request $request, $country_id)
    {
        return $ports = Office::where([['country_id','=',$country_id],['type_id','=','0']])->pluck('name', 'id')->toArray();
        return $ports;
    }
    public function getBatchByVessel(Request $request, $vessel_id)
    {
        $batch = Batch::where('status', 'ideal')->where('vessel_id', $vessel_id)->first();

        if($batch)
            return $batch->name;
        return "-";
        // return $vessel->batch->name;
    }
}
