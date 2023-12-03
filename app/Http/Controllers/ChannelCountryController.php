<?php

namespace App\Http\Controllers;

use App\Models\ChannelCountry;
use Illuminate\Http\Request;

class ChannelCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channelCountries = ChannelCountry::all();
        return view('admin.channels.countries.index' , compact('channelCountries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.channels.countries.create' );

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
            'Category_group.*.name' => 'required|unique:channel_countries,channel_country',
        ]);



        foreach ($request->Category_group as $item) {

           ChannelCountry::create([

            'channel_country' => $item['name']

           ]);
        }
        toastr()->success('Data has been inserted successfully!');
        return redirect()->route('channels.countries.admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChannelCountry  $channelCountry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $channelCountry = ChannelCountry::find($id);
        return view('admin.channels.countries.show' , compact('channelCountry') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChannelCountry  $channelCountry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channelCountry = ChannelCountry::find($id);
        return view('admin.channels.countries.edit' , compact('channelCountry') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChannelCountry  $channelCountry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $channelCountry = ChannelCountry::find($id);
        $channelCountry->update([
            'channel_country'=> $request->name
        ]);

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('channels.countries.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChannelCountry  $channelCountry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channelCountry = ChannelCountry::find($id);
        $channelCountry->delete();

        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('channels.countries.admin');
    }
}
