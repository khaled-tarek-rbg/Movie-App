<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Anime_seasons;
use App\Models\AnimeSeasonComment;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Type;
use Illuminate\Http\Request;

class AnimeSeasonsController extends Controller
{

    public function index()
    {
        $anime_seasons = Anime_seasons::all();
        return view('admin.anime_seasons.index', compact('anime_seasons'));
    }


    public function create()
    {
        $animes = Anime::all();
        return view('admin.anime_seasons.create', compact('animes'));
    }


    public function store(Request $request)
    {
        if (Anime_seasons::where('season_number', $request->season_number)->where('anime_id', $request->animes)->exists()) {
            return back()->with('message', 'already exists');
        } else {
            $path = $request->season_poster->store('public/images/anime_posters');
            Anime_seasons::create([
                'season_number' => $request->season_number,
                'anime_id' => $request->animes,
                'season_poster' => $path,
                'season_production_year' => $request->season_production_year,
            ]);
            toastr()->success('Data has been inserted successfully!');

            return redirect()->route('animes.admin.seasons');
        };
    }


    public function show($id)
    {
        $season = Anime_seasons::find($id);
        return view('admin.anime_seasons.show', compact('season'));
    }



    public function clientShow($id)
    {
        $season = Anime_seasons::find($id);
        $comments = AnimeSeasonComment::all()->where('anime_season_id', $id);
        $categories = Category::all();

        $all_movies = Movie::all();
        $types = Type::all();

        $anime_cat_ids = $season->anime->categories->pluck('id');


        $similarEposides = Anime::whereHas('categories', function ($query) use ($anime_cat_ids) {
            return $query->whereIn('categories.id', $anime_cat_ids);
        })->where('id', '!=', $season->anime->id)->get();

        return view('clients.anime_seasons.show', compact('season', 'comments', 'similarEposides', 'all_movies', 'types', 'categories'));
    }




    public function edit($id)
    {
        $season = Anime_seasons::find($id);
        $animes = Anime::all();
        return view('admin.anime_seasons.edit', compact('season', 'animes'));
    }




    public function update(Request $request, $id)
    {
        $season = Anime_seasons::find($id);

        if ($request->has('season_poster')) {
            $path = $request->season_poster->store('public/images/anime_posters');
        } else {
            $path = $season->season_poster;
        }

        $season->update([
            'season_number' => $request->season_number,
            'anime_id' => $request->animes,
            'season_poster' => $path,
            'season_production_year' => $request->season_production_year,
        ]);
        toastr()->success('Data has been updated successfully!');

        return redirect()->route('animes.admin.seasons');
    }


    public function destroy($id)
    {
        $season = Anime_seasons::find($id);
        $season->delete();
        toastr()->success('Data has been deleted successfully!');

        return redirect()->route('animes.admin.seasons');
    }
}
