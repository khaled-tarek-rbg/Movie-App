<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Channel;
use App\Models\ChannelCountry;
use App\Models\Type;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

    public function index()
    {
        $channels = Channel::all();

        return view('admin.channels.index', compact('channels'));
    }

    public function clientIndex()
    {
        $types = Type::all();


        return view('clients.channels.index', compact('types'));
    }


    public function create()
    {
        return view('admin.channels.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:channels,name',
            'countries' => 'required',
            'types' => 'required',
            'poster' => 'required|image|mimes:png,jpg',
        ]);




        $path = $request->poster->store('public/images/channels');

        Channel::create([
            'name' => $request->name,
            'poster' => $path,
            'channel_country_id' => $request->countries,
            'channel_type_id' => $request->types,
        ]);


        toastr()->success('data inserted');
        return redirect()->route('channels.admin');
    }


    public function show( $id)
    {
        $channel = Channel::find($id);
        return view('admin.channels.show', compact('channel'));
    }


    public function edit(Channel $channel, $id)
    {
        $channel = Channel::find($id);
        return view('admin.channels.edit', compact('channel'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'countries' => 'required',
            'types' => 'require',

        ]);

        $channel = Channel::find($id);

        if ($request->has('poster')) {
            $path = $request->poster->store('images/channels');
        } else {
            $path = $channel->poster;
        }

        $channel->update([
            'name' => $request->name,
            'poster' => $path,
            'channel_country_id' => $request->countries,
            'channel_type_id' => $request->types,
        ]);
        toastr()->success('data updated successfully');
        return redirect()->route('channels.admin');
    }

    public function destroy(Channel $channel, $id)
    {
        $channel = Channel::find($id);
        $channel->delete();

        toastr()->success('data deleted');


        return redirect()->route('channels.admin');
    }
}
