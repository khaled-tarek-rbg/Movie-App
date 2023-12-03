<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Anime_eposides;
use App\Models\Anime_movies;
use App\Models\AnimeEposideComment;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Type;
use Illuminate\Http\Request;

class AnimeEposidesController extends Controller
{

    public function index()
    {
        $anime_eposides = Anime_eposides::all();
        return view('admin.anime_eposides.index', compact('anime_eposides'));
    }

    public function clientIndex()
    {
        $categories = Category::all();
        $types = Type::all();
        $all_movies = Movie::all();

        $anime_eposides = Anime_eposides::orderBy('id', 'DESC')->take(10)->get();
        $movies = Anime_movies::orderBy('id', 'DESC')->take(5)->get();
        $paginated_eposides = Anime_eposides::paginate(20);
        return view('clients.animes_eposides.index', compact('anime_eposides', 'paginated_eposides', 'categories', 'movies', 'types','all_movies'));
    }


    public function create()
    {
        return view('admin.anime_eposides.create');
    }

    public function store(Request $request)
    {
        Anime_eposides::create([
            'eposide_number' => $request->eposide_number,
            'season_id' => $request->seasons,
            'anime_id' => $request->animes,
            'rate' => $request->rate,

        ]);
        toastr()->success('data inserted');

        return redirect()->route('animes.admin.eposides');
    }

    public function show($id)
    {
        $eposide = Anime_eposides::find($id);

        return view('admin.anime_eposides.show', compact('eposide'));
    }


    public function clientShow($id)
    {
        $comments = AnimeEposideComment::all()->where('anime_eposide_id', $id);
        $categories = Category::all();
        $all_movies = Movie::all();
        $types = Type::all();
        $eposide = Anime_eposides::find($id);
        $prevEposide = Anime_eposides::where('eposide_number', $eposide->eposide_number - 1)->where('anime_id', $eposide->anime->id)->where('season_id', $eposide->season->id)->first();

        $nextEposide = Anime_eposides::where('eposide_number', $eposide->eposide_number + 1)->where('anime_id', $eposide->anime->id)->where('season_id', $eposide->season->id)->first();



        $anime_cat_ids = $eposide->anime->categories->pluck('id');

        $similar_animes = Anime::whereHas('categories', function ($query) use ($anime_cat_ids) {
            return $query->whereIn('categories.id', $anime_cat_ids);
        })->where('id', '!=', $eposide->anime->id)->get();

        return view('clients.animes_eposides.show', compact('eposide', 'comments', 'prevEposide', 'nextEposide', 'similar_animes', 'id', 'all_movies', 'types', 'categories'));
    }





    public function edit($id)
    {
        $eposide = Anime_eposides::find($id);
        return view('admin.anime_eposides.edit', compact('eposide'));
    }

    public function update(Request $request, $id)
    {
        $eposide = Anime_eposides::find($id);
        $eposide->update($request->all());

        toastr()->success('data updated successfully');

        return redirect()->route('animes.admin.eposides');
    }
    public function destroy($id)
    {
        $eposide = Anime_eposides::find($id);
        $eposide->delete();

        toastr()->success('data deleted successfully');

        return redirect()->route('animes.admin.eposides');
    }
}
