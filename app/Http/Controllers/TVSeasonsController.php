<?php

namespace App\Http\Controllers;

use App\Http\Livewire\TvEposideEditForm;
use App\Models\Category;
use App\Models\Movie;
use App\Models\TV;
use App\Models\TV_seasons;
use App\Models\TVSeasonComment;
use App\Models\Type;
use Illuminate\Http\Request;

class TVSeasonsController extends Controller
{
    public function index()
    {
        $seasons = TV_seasons::all();
        return view('admin.tv_seasons.index', compact('seasons'));
    }


    public function create()
    {
        $tvs = TV::all();
        return view('admin.tv_seasons.create', compact('tvs'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'season_number' => 'required',
            'series' => 'required',
            'season_poster' => 'required|image|mimes:png,jpg,jpeg',
            'season_production_year' => 'required|numeric'
        ]);



        if (TV_seasons::where('season_number', $request->season_number)->where('tv_id', $request->tvs)->exists()) {
            return back()->with('message', 'already exists');
        } else {

            $path = $request->season_poster->store('public/images/tvs_posters');

            TV_seasons::create([
                'season_number' => $request->season_number,
                'tv_id' => $request->tvs,
                'season_poster' => $path,
                'season_production_year' => $request->season_production_year,

            ]);

            toastr()->success('Data has been inserted successfully!');

            return redirect('seasons');
        }
    }

    public function adminShow($id)
    {
        $season = TV_seasons::find($id);
        return view('admin.tv_seasons.show', compact('season'));
    }





    public function show($id)
    {
        $tv_season = TV_seasons::find($id);
        $eposideCategories = $tv_season->tv->categories->pluck('id');
        $types = Type::all();
        $categories = Category::all();
        $comments = TVSeasonComment::all()->where('tv_season_id', $id);
$all_movies= Movie::all();


        $similarEposides = TV::whereHas('categories', function ($query) use ($eposideCategories) {
            return $query->whereIn('categories.id', $eposideCategories);
        })->where('id', '!=', $tv_season->tv->id)->get();

        return view('clients.tv_seasons.show', compact('tv_season', 'similarEposides', 'types', 'categories', 'comments','all_movies'));
    }

    public function edit($id)
    {
        $season = TV_seasons::find($id);
        $tvs = Tv::all();
        return view('admin.tv_seasons.edit', compact('season', 'tvs'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'season_number' => 'required',
            'tvs' => 'required',
            'season_production_year' => 'required|numeric'
        ]);

        $season = TV_seasons::find($id);

        if ($request->has('season_poster')) {

            $path = $request->season_poster->store('public/images/tvs_posters');
        } else {
            $path = $season->season_poster;
        }

        $season->update([
            'season_number' => $request->season_number,
            'tv_id' => $request->tvs,
            'season_poster' => $path,
            'season_production_year' => $request->season_production_year,
        ]);

        toastr()->success('Data has been updated successfully!');

        return redirect()->route('tvs.admin.seasons');
    }

    public function destroy($id)
    {
        $season =  TV_seasons::find($id);
        $season->delete();
        toastr()->success('Data has been deleted successfully!');

        return redirect()->route('tvs.admin.seasons');
    }
}
