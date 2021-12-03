<?php

namespace App\Http\Controllers;

use App\Models\Continents;
use Illuminate\Http\Request;

class ContinentsController extends Controller
{
    public function data(){
        //work under progress
    }
    public function index(){
        return view('admin_controlls.continent');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Continents  $continents
     * @return \Illuminate\Http\Response
     */
    public function show(Continents $continents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Continents  $continents
     * @return \Illuminate\Http\Response
     */
    public function edit(Continents $continents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Continents  $continents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Continents $continents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Continents  $continents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continents $continents)
    {
        //
    }
}
