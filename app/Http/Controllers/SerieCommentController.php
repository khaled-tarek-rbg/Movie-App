<?php

namespace App\Http\Controllers;

use App\Models\Serie_Comment;
use Illuminate\Http\Request;

class SerieCommentController extends Controller
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
        Serie_Comment::create([
            'title' => $request->title,
            'serie_id' => $request->serie,
            'user_id' => auth()->user()->id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie_Comment  $serie_Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Serie_Comment $serie_Comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serie_Comment  $serie_Comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie_Comment $serie_Comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie_Comment  $serie_Comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie_Comment $serie_Comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie_Comment  $serie_Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie_Comment $serie_Comment)
    {
        //
    }
}
