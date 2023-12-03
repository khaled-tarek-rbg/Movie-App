<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
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
    public function watchServer()
    {
        $movies = Movie::all();
        return view('admin.servers.watch' , compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function watchServerStore(Request $request)
    {
        foreach($request->server_group as $item){
            Server::create([
                'movie_id' => $request->movie,
                'url' => str_replace(' ' , '' ,  $item['name'])
            ]);
        }

        toastr()->success('inserted successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function watchServerShow($id)
    {
        $movie = Movie::find($id);

        return view('admin.servers.watch-show' , compact('movie'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function watchServerEdit($id)
    {
        $server = Server::find($id);

        return view('admin.servers.watch-edit' , compact('server'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function watchServerUpdate(Request $request , $id)
    {
        $server = Server::find($id);
        $server->update([
            'url' => $request->servers
        ]);

        toastr()->success('update success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function watchServerDelete($id)
    {
        $server = Server::find($id);
        $server->delete();

        toastr()->success('update success');
        return back();
    }
}
