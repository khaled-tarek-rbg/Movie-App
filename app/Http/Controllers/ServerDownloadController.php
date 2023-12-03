<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\ServerDownload;
use Illuminate\Http\Request;

class ServerDownloadController extends Controller
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
    public function downloadServer()
    {
        $movies = Movie::all();
        return view('admin.servers.download' , compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function downloadServerStore(Request $request)
    {
        foreach($request->server_group as $item){
            ServerDownload::create([
                'movie_id' => $request->movie,
                'url' => str_replace(' ' , '' ,  $item['name'])
            ]);
        }

        toastr()->success('inserted successfully');
        return back();
    }
    public function watchServerDownload($id)
    {
        $movie = Movie::find($id);

        return view('admin.servers.download-show' , compact('movie'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServerDownload  $serverDownload
     * @return \Illuminate\Http\Response
     */
    public function downloadServerEdit($id)
    {
        $server = ServerDownload::find($id);

        return view('admin.servers.download-edit' , compact('server'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServerDownload  $serverDownload
     * @return \Illuminate\Http\Response
     */
    public function downloadServerUpdate( Request $request , $id)
    {
        $server = ServerDownload::find($id);
        $server->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServerDownload  $serverDownload
     * @return \Illuminate\Http\Response
     */
    public function downloadServerDelete( $id)
    {
        $server = ServerDownload::find($id);
        $server->delete();

        toastr()->success('update success');
        return back();
    }
}
