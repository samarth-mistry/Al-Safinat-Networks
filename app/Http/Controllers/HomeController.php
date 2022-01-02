<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:client|superadministrator');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('admins.dashboard');
        //return redirect()->route('admin-dashboard')->with("message", "Admin login successfull!");
        return redirect()->route('client-dashboard')->with("message", "Login successfull!");
    }
}
