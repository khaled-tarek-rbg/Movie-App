<?php

namespace App\Http\Controllers;

use App\Models\TVComment;
use Illuminate\Http\Request;

class TVCommentController extends Controller
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
        TVComment::create([
            'title' => $request->title,
            'tv_id' => $request->tv,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TVComment  $tVComment
     * @return \Illuminate\Http\Response
     */
    public function show(TVComment $tVComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TVComment  $tVComment
     * @return \Illuminate\Http\Response
     */
    public function edit(TVComment $tVComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TVComment  $tVComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TVComment $tVComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TVComment  $tVComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TVComment $tVComment)
    {
        //
    }
}
