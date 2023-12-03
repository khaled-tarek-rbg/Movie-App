<?php

namespace App\Http\Controllers;

use App\Models\AnimeEposideComment;
use Illuminate\Http\Request;

class AnimeEposideCommentController extends Controller
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
        AnimeEposideComment::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'anime_eposide_id' => $request->eposide
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimeEposideComment  $animeEposideComment
     * @return \Illuminate\Http\Response
     */
    public function show(AnimeEposideComment $animeEposideComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeEposideComment  $animeEposideComment
     * @return \Illuminate\Http\Response
     */
    public function edit(AnimeEposideComment $animeEposideComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimeEposideComment  $animeEposideComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnimeEposideComment $animeEposideComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimeEposideComment  $animeEposideComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnimeEposideComment $animeEposideComment)
    {
        //
    }
}
