<?php

namespace App\Http\Controllers;

use App\Models\TV_eposides;
use App\Models\TvEposideDownloadServer;
use Illuminate\Http\Request;

class TvEposideDownloadServerController extends Controller
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
        return view('admin.TvEposideDownloadServer.create');
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
            TvEposideDownloadServer::create([
                'tv_id' => $request->tv,
                'eposide_id' => $request->eposide,
                'season_id' => $request->season,
                'url' => str_replace(' ' , '' ,  $item['name'])
            ]);
        }

        toastr()->success('inserted successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TvEposideDownloadServer  $tvEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eposide = TV_eposides::find($id);
        return view('admin.TvEposideDownloadServer.show' , compact('eposide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TvEposideDownloadServer  $tvEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $eposideWatchServer = TvEposideDownloadServer::find($id);
        return view('admin.TvEposideDownloadServer.edit' , compact('eposideWatchServer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TvEposideDownloadServer  $tvEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $eposideWatchServer = TvEposideDownloadServer::find($id);
        $eposideWatchServer->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TvEposideDownloadServer  $tvEposideDownloadServer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eposideWatchServer = TvEposideDownloadServer::find($id);

        $eposideWatchServer->delete();

        toastr()->success('Eposide watch server deleted successfully');

        return back();
    }
}
