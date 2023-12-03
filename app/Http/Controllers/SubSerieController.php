<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Eposide_Comment;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Sub_serie;
use App\Models\Type;
use Illuminate\Http\Request;

class SubSerieController extends Controller
{
    public function index(Request $request)
    {

        $eposides = Sub_serie::all();


        // foreach($eposides as $item){

        //     return $item->serieWatchServers;
        // }

        return view('admin.eposides.index', compact('eposides'));
    }


    public function clientIndex()
    {
        $categories = Category::all();
        $types = Type::all();
        $all_movies = Movie::all();

        $eposides = Sub_serie::orderBy('id', 'desc')->take(15)->get();
        $paginatedEposides = Sub_serie::orderBy('id', 'desc')->paginate(20);
        return view('clients.eposides.index', compact('categories', 'eposides', 'paginatedEposides', 'types','all_movies'));
    }


    public function create()
    {

        return view('admin.eposides.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'eposide_number' => 'required|numeric',
            'eposide_rate' => 'required|numeric',
            'series' => 'required|numeric',
            'seasons' => 'required|numeric',
        ]);

        if (Sub_serie::where('serie_number', $request->eposide_number)->where('serie_id', $request->series)->where('season_id', $request->seasons)->exists()) {
            return back()->with('message', 'already exists');
        } else {

            Sub_serie::create([
                'serie_number' => $request->eposide_number,
                'eposide_rate' => $request->eposide_rate,
                'serie_id' => $request->series,
                'season_id' => $request->seasons,



            ]);

            toastr()->success('Data has been saved successfully!');

            return redirect('eposides');
        }
    }


    public function show($id)
    {
        $eposide = Sub_serie::find($id);

        return view('admin.eposides.show', compact('eposide'));
    }



    public function clientShow($id)
    {
        $eposide = Sub_serie::find($id);
        $all_movies = Movie::all();


        $comments = Eposide_Comment::all()->where('eposide_id', $id);


        $prevEposide = Sub_serie::where('serie_number', $eposide->serie_number - 1)->where('serie_id', $eposide->serie->id)->where('season_id', $eposide->season_id)->first();

        $nextEposide = Sub_serie::where('serie_number', $eposide->serie_number + 1)->where('serie_id', $eposide->serie->id)->where('season_id', $eposide->season_id)->first();

        $categories = Category::all();
        $types = Type::all();



        $eposideCategories = $eposide->serie->categories->pluck('id');


        $similarEposides = Serie::whereHas('categories', function ($query) use ($eposideCategories) {
            return $query->whereIn('id', $eposideCategories);
        })->where('id', '!=', $eposide->serie->id)->get();


        return view('clients.eposides.show', compact('eposide', 'categories', 'similarEposides', 'prevEposide', 'nextEposide', 'id', 'comments', 'types','all_movies'));
    }


    public function edit($id)
    {
        $eposide = Sub_serie::find($id);
        $series  = Serie::all();
        return view('admin.eposides.edit', compact('eposide', 'series', 'id'));
    }



    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'eposide_number' => 'required|numeric',
            'eposide_rate' => 'required|numeric',
            'series' => 'required|numeric',
            'seasons' => 'required|numeric',

        ]);

        $eposide = Sub_serie::find($id);

        $eposide->update([
            'serie_number' => $request->eposide_number,
            'eposide_rate' => $request->eposide_rate,
            'serie_id' => $request->series,
            'season_id' => $request->seasons,
        ]);
        toastr()->success('Data has been updated successfully!');
        return redirect('eposides');
    }





    public function destroy($id)
    {
        $eposide = Sub_serie::find($id);
        $eposide->delete();
        return redirect('eposides');
    }
}
