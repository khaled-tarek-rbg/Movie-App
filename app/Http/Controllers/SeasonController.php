<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Season;
use App\Models\Serie;
use App\Models\SerieSeasonComment;
use App\Models\Type;
use Illuminate\Http\Request;

class SeasonController extends Controller
{

    public function index()
    {
        $seasons = Season::all();
        return view('admin.seasons.index', compact('seasons'));
    }


    public function create()
    {
        $series = Serie::all();
        return view('admin.seasons.create', compact('series'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'season_number' => 'required',
            'series' => 'required',
            'season_poster' => 'required|image|mimes:png,jpg,jpeg',
            'season_production_year' => 'required|numeric'
        ]);



        if (Season::where('season_number', $request->season_number)->where('serie_id', $request->series)->exists()) {
            return back()->with('message', 'already exists');
        } else {

            $path = $request->season_poster->store('public/images/series_posters');

            Season::create([
                'season_number' => $request->season_number,
                'serie_id' => $request->series,
                'season_poster' => $path,
                'season_production_year' => $request->season_production_year,

            ]);

            toastr()->success('Data has been inserted successfully!');

            return redirect('seasons');
        }
    }





    public function show($id)
    {
        $season = Season::find($id);

        $types = Type::all();
        $all_movies = Movie::all();
        $comments = SerieSeasonComment::all()->where('season_id', $id);


        $categories = Category::all();

        $eposideCategories = $season->serie->categories->pluck('id');
        $similarEposides = Serie::whereHas('categories', function ($query) use ($eposideCategories) {
            return $query->whereIn('id', $eposideCategories);
        })->where('id', '!=', $season->serie->id)->get();

        return view('clients.seasons.show', compact('all_movies','season', 'categories', 'similarEposides',  'types', 'comments'));
    }

    public function adminShow($id)
    {
        $season = Season::find($id);
        return view('admin.seasons.show', compact('season'));
    }


    public function edit($id)
    {
        $season = Season::find($id);
        $series = Serie::all();
        return view('admin.seasons.edit', compact('season', 'series'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'season_number' => 'required',
            'series' => 'required',
            'season_production_year' => 'required|numeric'
        ]);

        $season = Season::find($id);

        if ($request->has('season_poster')) {

            $path = $request->season_poster->store('public/images/series_posters');
        } else {
            $path = $season->season_poster;
        }

        $season->update([
            'season_number' => $request->season_number,
            'serie_id' => $request->series,
            'season_poster' => $path,
            'season_production_year' => $request->season_production_year,
        ]);

        toastr()->success('Data has been updated successfully!');

        return redirect('seasons');
    }

    public function destroy($id)
    {
        $season =  Season::find($id);
        $season->delete();
        toastr()->success('Data has been deleted successfully!');

        return redirect()->route('seasons');
    }
}
