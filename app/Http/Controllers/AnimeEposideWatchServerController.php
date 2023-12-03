<?php

namespace App\Http\Controllers;

use App\Models\Anime_eposides;
use App\Models\AnimeEposideWatchServer;
use Illuminate\Http\Request;

class AnimeEposideWatchServerController extends Controller
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
        return view('admin.anime-eposides-watch-servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->watchserver_group;
         foreach($request->Watch_group as $item){
            AnimeEposideWatchServer::create([
                'anime_id' => $request->animes,
                'eposide_id' => $request->eposides,
                'season_id' => $request->seasons,
                'url' => str_replace(' ' , '' ,  $item['name'])
            ]);
         }

        toastr()->success('inserted successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimeEposideWatchServer  $animeEposideWatchServer
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $eposide = Anime_eposides::find($id);

        return view('admin.anime-eposides-watch-servers.show' , compact('eposide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeEposideWatchServer  $animeEposideWatchServer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eposideWatchServer = AnimeEposideWatchServer::find($id);

        return view('admin.anime-eposides-watch-servers.edit' , compact('eposideWatchServer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimeEposideWatchServer  $animeEposideWatchServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $eposideWatchServer = AnimeEposideWatchServer::find($id);
        $eposideWatchServer->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimeEposideWatchServer  $animeEposideWatchServer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $eposideWatchServer = AnimeEposideWatchServer::find($id);
        $eposideWatchServer->delete();

        toastr()->success('update success');
        return back();

    }
}
