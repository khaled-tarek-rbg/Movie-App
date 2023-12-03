<?php

namespace App\Http\Controllers;

use App\Models\ChannelCountry;
use App\Models\ChannelType;
use Illuminate\Http\Request;

class ChannelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channelsTypes = ChannelType::all();
        return view('admin.channels.types.index' , compact('channelsTypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channelsCountries= ChannelCountry::all();

        return view('admin.channels.types.create' , compact('channelsCountries'));
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
            'types.*.name' => 'required|unique:channel_types,name',
            'countries' => 'required'
        ]);



        foreach ($request->types as $item) {

           ChannelType::create([

            'name' => $item['name'],
            'channel_country_id' => $request->countries

           ]);
        }
        toastr()->success('Data has been inserted successfully!');
        return redirect()->route('channels.types.admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channelType = ChannelType::find($id);
        $channelsCountries = ChannelCountry::all();
        return view('admin.channels.types.edit' , compact('channelType' , 'channelsCountries') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $channelType = ChannelType::find($id);

        $channelType->update([

            'channel_country_id' => $request->countries,
            'name' => $request->name,

        ]);
        toastr()->success('Data has been updated successfully!');
        return redirect()->route('channels.types.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channelType = ChannelType::find($id);

        $channelType->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('channels.types.admin');
    }
}
