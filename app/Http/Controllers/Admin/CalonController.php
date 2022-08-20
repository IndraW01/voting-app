<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Calon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalonRequest;
use App\Http\Requests\UpdateCalonRequest;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCalonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $calon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalonRequest  $request
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalonRequest $request, Calon $calon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        //
    }
}
