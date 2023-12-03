<?php

namespace App\Http\Controllers;

use App\Models\Anime_movies;
use App\Models\AnimeEposideDownloadServer;
use App\Models\AnimeMovieDownloadServer;
use Illuminate\Http\Request;

class AnimeMovieDownloadServerController extends Controller
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
        return view('admin.anime-eposides-download-servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     foreach($request->server_group as $item){
    //         AnimeEposideDownloadServer::create([
    //             'anime_id' => $request->animes,
    //             'eposide_id' => $request->eposides,
    //             'season_id' => $request->seasons,
    //             'url' => str_replace(' ' , '' ,  $item['name'])
    //         ]);
    //      }

    //     toastr()->success('inserted successfully');
    //     return back();
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimeMovieDownloadServer  $animeMovieDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $anime = Anime_movies::find($id);
        return view('admin.anime-movie-download-servers.show' , compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeMovieDownloadServer  $animeMovieDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AnimeMovieDownload = AnimeMovieDownloadServer::find($id);
        return view('admin.anime-movie-download-servers.edit' , compact('AnimeMovieDownload'));

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
        $server = AnimeMovieDownloadServer::find($id);
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
        $server = AnimeMovieDownloadServer::find($id);
        toastr()->success('update success');
        return back();
        $server->delete();

    }
}
