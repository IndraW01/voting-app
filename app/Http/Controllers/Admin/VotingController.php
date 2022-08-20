<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Voting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVotingRequest;
use App\Http\Requests\UpdateVotingRequest;

class VotingController extends Controller
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
     * @param  \App\Http\Requests\StoreVotingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVotingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function show(Voting $voting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function edit(Voting $voting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVotingRequest  $request
     * @param  \App\Models\Admin\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVotingRequest $request, Voting $voting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voting $voting)
    {
        //
    }
}
