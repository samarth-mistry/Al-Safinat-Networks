<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function checkTracking(Request $request)
    {

    }
}
