<?php

namespace App\Http\Controllers;

use App\Models\Anime_seasons;
use App\Models\AnimeSeasonComment;
use Illuminate\Http\Request;

class AnimeSeasonCommentController extends Controller
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
        AnimeSeasonComment::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'anime_season_id' => $request->anime_season
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimeSeasonComment  $animeSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function show(AnimeSeasonComment $animeSeasonComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeSeasonComment  $animeSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function edit(AnimeSeasonComment $animeSeasonComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimeSeasonComment  $animeSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnimeSeasonComment $animeSeasonComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimeSeasonComment  $animeSeasonComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnimeSeasonComment $animeSeasonComment)
    {
        //
    }
}
