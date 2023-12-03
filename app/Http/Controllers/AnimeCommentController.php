<?php

namespace App\Http\Controllers;

use App\Models\AnimeComment;
use Illuminate\Http\Request;

class AnimeCommentController extends Controller
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
        AnimeComment::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'anime_id' => $request->anime
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimeComment  $animeComment
     * @return \Illuminate\Http\Response
     */
    public function show(AnimeComment $animeComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeComment  $animeComment
     * @return \Illuminate\Http\Response
     */
    public function edit(AnimeComment $animeComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimeComment  $animeComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnimeComment $animeComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimeComment  $animeComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnimeComment $animeComment)
    {
        //
    }
}
