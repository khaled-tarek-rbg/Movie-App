<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelServer;
use Illuminate\Http\Request;

class ChannelServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $channelServers = ChannelServer::all();
    //     return view('admin.channels.servers.index' , compact('channelServers'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::all();
        return view('admin.channels.servers.create' , compact('channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'channels' => 'required',
            'servers.*.url' => 'required',
        ]);



        foreach ($request->servers as $item) {

           ChannelServer::create([

            'channel_id' => $request->channels,

            'url' => $item['url']

           ]);
        }
        toastr()->success('Data has been inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChannelServer  $channelServer
     * @return \Illuminate\Http\Response
     */
    public function show(ChannelServer $channelServer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChannelServer  $channelServer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $server = ChannelServer::find($id);

        return view('admin.channels.servers.edit' , compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChannelServer  $channelServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $server = ChannelServer::find($id);

        $server->update([

            'url' => $request->url,
            'channel_id' => $server->channel_id

        ]);

        toastr()->success('Data has been updated successfully!');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChannelServer  $channelServer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $server = ChannelServer::find($id);
        $server->delete();
        toastr()->success('Data has been deleted successfully!');
        return back();

    }
}
