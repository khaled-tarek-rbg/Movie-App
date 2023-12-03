<?php

namespace App\Http\Controllers;

use App\Models\SerieWatchServer;
use App\Models\Sub_serie;
use Illuminate\Http\Request;

class SerieWatchServerController extends Controller
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
        return view('admin.seriewatchserver.create');
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
            SerieWatchServer::create([
                'serie_id' => $request->serie,
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
     * @param  \App\Models\SerieWatchServer  $serieWatchServer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $eposide =  Sub_serie::find($id);

       return view('admin.seriewatchserver.show' , compact('eposide'));
    }

    public function edit($id)
    {
        $eposideWatchServer = SerieWatchServer::find($id);
        return view('admin.seriewatchserver.edit' , compact('eposideWatchServer'));

    }

    public function update(Request $request ,  $id)
    {
        $eposideWatchServer = SerieWatchServer::find($id);
        $eposideWatchServer->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();

    }


    public function destroy( $id)
    {
        $eposideWatchServer = SerieWatchServer::find($id);

        $eposideWatchServer->delete();

        toastr()->success('Eposide watch server deleted successfully');

        return back();
    }
}
