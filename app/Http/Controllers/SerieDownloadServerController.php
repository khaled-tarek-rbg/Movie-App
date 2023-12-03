<?php

namespace App\Http\Controllers;

use App\Models\SerieDownloadServer;
use App\Models\Sub_serie;
use Illuminate\Http\Request;

class SerieDownloadServerController extends Controller
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
        return view('admin.seriedownloadserver.create');
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
            SerieDownloadServer::create([
                'serie_id' => $request->serie,
                'eposide_id' => $request->eposide,
                'season_id' => $request->season,
                'url' => str_replace(' ' , '' ,  $item['name'])
            ]);
        }

        toastr()->success('inserted successfully');
        return back();
    }




    public function show($id)
    {
       $eposide =  Sub_serie::find($id);

       return view('admin.seriedownloadserver.show' , compact('eposide'));
    }

    public function edit($id)
    {
        $eposideSownloadServer = SerieDownloadServer::find($id);
        return view('admin.seriedownloadserver.edit' , compact('eposideSownloadServer'));

    }

    public function update(Request $request ,  $id)
    {
        $eposideSownloadServer = SerieDownloadServer::find($id);
        $eposideSownloadServer->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();

    }


    public function destroy( $id)
    {
        $eposideSownloadServer = SerieDownloadServer::find($id);

        $eposideSownloadServer->delete();

        toastr()->success('Eposide watch server deleted successfully');

        return back();
    }
}
