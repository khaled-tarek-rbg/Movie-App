<?php

namespace App\Http\Controllers;

use App\Models\Anime_Movies_Comment;
use Illuminate\Http\Request;

class AnimeMoviesCommentController extends Controller
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
        Anime_Movies_Comment::create([
            'title' => $request->comment,
            'anime_movie_id' => $request->anime_movie,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anime_Movies_Comment  $anime_Movies_Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Anime_Movies_Comment $anime_Movies_Comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anime_Movies_Comment  $anime_Movies_Comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime_Movies_Comment $anime_Movies_Comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anime_Movies_Comment  $anime_Movies_Comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime_Movies_Comment $anime_Movies_Comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anime_Movies_Comment  $anime_Movies_Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime_Movies_Comment $anime_Movies_Comment)
    {
        //
    }
}
