<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Anime_movies;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Sub_serie;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }


    public function create()
    {
        return view('admin.types.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'types_group.*.name' => 'required|unique:types,name',
        ]);
        foreach ($request->types_group as $item) {
            Type::create([
                'name' => $item['name']
            ]);
        }
        toastr()->success('Data successfully inserted');
        return redirect('types');
    }


    public function show($id)
    {


        $type = Type::find($id);
        $types = Type::all();
        $categories = Category::all();
        $all_movies = Movie::all();

         return view('clients.types.show' , compact('type' , 'types' , 'categories' , 'all_movies'));




    }

    public function subTypeShow($id)
    {


        $type = Type::find($id);

        return view('admin.sub_types.show' , compact('type'));




    }





    public function edit($id)
    {
        $type = Type::find($id);

        return view('admin.types.edit', compact('type'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:types,name',
        ]);

        $type = Type::find($id);

        $type->update($request->all());

        toastr()->success('Data successfully updated');
        return redirect('types');
    }


    public function destroy($id)
    {
        $type = Type::find($id);

        $type->delete();

        toastr()->success('Data successfully deleted');
        return redirect('types');
    }
}
