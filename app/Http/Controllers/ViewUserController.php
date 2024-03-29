<?php

namespace App\Http\Controllers;

use App\Models\Viewer;
use Illuminate\Http\Request;

class ViewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewers = Viewer::latest("id")->paginate(10);
        return view('viewers',compact("viewers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function show(Viewer $viewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function edit(Viewer $viewer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viewer $viewer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viewer $viewer)
    {
        //
    }
}
