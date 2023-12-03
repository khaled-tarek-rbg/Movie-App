<?php

namespace App\Http\Controllers;

use App\Models\Anime_movies;
use App\Models\AnimeMovieWatchServer;
use App\Models\AnimeWatchServer;
use Illuminate\Http\Request;

class AnimeMovieWatchServerController extends Controller
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
        foreach($request->server_group as $item){
            AnimeMovieWatchServer::create([
                'anime_movie_id' => $request->animes,
                'url' => str_replace(' ' , '' ,  $item['name'])
            ]);
        }

        toastr()->success('inserted successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimeMovieWatchServer  $animeMovieWatchServer
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $anime = Anime_movies::find($id);
        return view('admin.anime-movie-watch-servers.show' , compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeMovieWatchServer  $animeMovieWatchServer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AnimeMovieWatch = AnimeMovieWatchServer::find($id);
        return view('admin.anime-movie-watch-servers.edit' , compact('AnimeMovieWatch'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimeMovieWatchServer  $animeMovieWatchServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,  $id)
    {
        $server = AnimeMovieWatchServer::find($id);
        $server->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimeMovieWatchServer  $animeMovieWatchServer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $server = AnimeMovieWatchServer::find($id);
        toastr()->success('update success');
        return back();
        $server->delete();

    }
}
