<?php

namespace App\Http\Controllers;

use App\Models\Eposide_Comment;
use Illuminate\Http\Request;

class EposideCommentController extends Controller
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
        Eposide_Comment::create([
            'title' => $request->title,
            'eposide_id' => $request->eposide,
            'user_id' => auth()->user()->id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eposide_Comment  $eposide_Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Eposide_Comment $eposide_Comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eposide_Comment  $eposide_Comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Eposide_Comment $eposide_Comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eposide_Comment  $eposide_Comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eposide_Comment $eposide_Comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eposide_Comment  $eposide_Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eposide_Comment $eposide_Comment)
    {
        //
    }
}
