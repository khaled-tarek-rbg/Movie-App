<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\SubType;
use App\Models\Type;
use Illuminate\Http\Request;

class SubTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_types = SubType::all();
        return view('admin.sub_types.index' , compact('sub_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.sub_types.create' , compact('types'));
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
            'subtypes_group.*.name' => 'required|unique:sub_types,name',
        ]);
        foreach($request->subtypes_group as $item){
            SubType::create([
                'type_id' => $request->type,
                'name' =>  $item['name']
            ]);
        }

        toastr()->success('inserted successfully');
        return redirect()->route("subtypes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubType  $subType
     * @return \Illuminate\Http\Response
     */
    public function show(SubType $subType , $id)
    {
        $subType = SubType::find($id);


        return view("admin.sub_types.show" , compact('subType'));
    }
    public function clientShow(SubType $subType , $id)
    {
        $types = Type::all();
        $categories = Category::all();

        $subType = SubType::find($id);

        $all_movies = Movie::all();


        return view("clients.subtypes.show" , compact('all_movies','subType' , 'types' , 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubType  $subType
     * @return \Illuminate\Http\Response
     */
    public function subTypeEdit( $id)
    {
        $subType = SubType::find($id);
        return view("admin.sub_types.edit" , compact('subType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubType  $subType
     * @return \Illuminate\Http\Response
     */
    public function subTypeUpdate(Request $request,  $id)
    {
        $subType = SubType::find($id);
        $subType->update([
            'name' => $request->subtype
        ]);
        toastr()->success('update success');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubType  $subType
     * @return \Illuminate\Http\Response
     */
    public function subTypeDelete( $id)
    {
        $subType = SubType::find($id);
        $subType->delete();
        toastr()->success('update success');
        return back();

    }
}
