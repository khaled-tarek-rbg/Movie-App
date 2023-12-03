<?php

namespace App\Http\Controllers;

use App\Models\Serie_Comment;
use App\Models\SerieSeasonComment;
use Illuminate\Http\Request;

class SerieSeasonCommentController extends Controller
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


    public function store(Request $request)
    {
        SerieSeasonComment::create([
            'title' => $request->title,
            'season_id' => $request->season,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SerieSeasonComment  $serieSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function show(SerieSeasonComment $serieSeasonComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SerieSeasonComment  $serieSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SerieSeasonComment $serieSeasonComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SerieSeasonComment  $serieSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SerieSeasonComment $serieSeasonComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SerieSeasonComment  $serieSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SerieSeasonComment $serieSeasonComment)
    {
        //
    }
}
