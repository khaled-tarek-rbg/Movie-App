<?php

namespace App\Http\Controllers;

use App\Models\Anime_eposides;
use App\Models\AnimeEposideDownloadServer;
use Illuminate\Http\Request;

class AnimeEposideDownloadServerController extends Controller
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
    public function store(Request $request)
    {
        foreach($request->server_group as $item){
            AnimeEposideDownloadServer::create([
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
     * @param  \App\Models\AnimeEposideDownloadServer  $animeEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $eposide = Anime_eposides::find($id);

        return view('admin.anime-eposides-download-servers.show' , compact('eposide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnimeEposideDownloadServer  $animeEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eposideDownloadServer = AnimeEposideDownloadServer::find($id);

        return view('admin.anime-eposides-watch-servers.edit' , compact('eposideDownloadServer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimeEposideDownloadServer  $animeEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $eposideDownloadServer = AnimeEposideDownloadServer::find($id);
        $eposideDownloadServer->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimeEposideDownloadServer  $animeEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $eposideDownloadServer = AnimeEposideDownloadServer::find($id);
        $eposideDownloadServer->delete();

        toastr()->success('deleted success');
        return back();
    }
}
