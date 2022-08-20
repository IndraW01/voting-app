<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Kampanye;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKampanyeRequest;
use App\Http\Requests\UpdateKampanyeRequest;

class KampanyeController extends Controller
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
     * @param  \App\Http\Requests\StoreKampanyeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKampanyeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Kampanye  $kampanye
     * @return \Illuminate\Http\Response
     */
    public function show(Kampanye $kampanye)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Kampanye  $kampanye
     * @return \Illuminate\Http\Response
     */
    public function edit(Kampanye $kampanye)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKampanyeRequest  $request
     * @param  \App\Models\Admin\Kampanye  $kampanye
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKampanyeRequest $request, Kampanye $kampanye)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Kampanye  $kampanye
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kampanye $kampanye)
    {
        //
    }
}
