<?php

namespace App\Http\Controllers;

use App\Models\TV_eposides_comments;
use Illuminate\Http\Request;

class TVEposidesCommentsController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TV_eposides_comments::create([
            'title' => $request->title,
            'tv_eposide_id' => $request->tv_eposide,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TV_eposides_comments  $tV_eposides_comments
     * @return \Illuminate\Http\Response
     */
    public function show(TV_eposides_comments $tV_eposides_comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TV_eposides_comments  $tV_eposides_comments
     * @return \Illuminate\Http\Response
     */
    public function edit(TV_eposides_comments $tV_eposides_comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TV_eposides_comments  $tV_eposides_comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TV_eposides_comments $tV_eposides_comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TV_eposides_comments  $tV_eposides_comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(TV_eposides_comments $tV_eposides_comments)
    {
        //
    }
}
