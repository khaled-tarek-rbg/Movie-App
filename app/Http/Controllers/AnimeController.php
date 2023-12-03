<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Anime_eposides;
use App\Models\Anime_movies;
use App\Models\Anime_seasons;
use App\Models\AnimeComment;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Type;
use Illuminate\Http\Request;

class AnimeController extends Controller
{

    public function index()
    {
        $animes = Anime::all();

        $categories = Category::all();
        return view('admin.animes.index', compact('animes', 'categories'));
    }

    public function animeSeries()
    {
        $anime_eposides = Anime_eposides::all();

        $categories = Category::all();
        $animes = Anime::paginate(20);

        $all_movies = Movie::all();
        $types = Type::all();
        $all_animes = Type::where('name',  'like', '%cartoon%')->get();
        return view('clients.animes.series', compact('animes', 'anime_eposides', 'all_movies', 'categories', 'types'));
    }

    public function animeMovies()
    {
        $anime_eposides = Anime_eposides::all();
        $categories = Category::all();
        $all_movies = Movie::all();
        $types = Type::all();
        $animes = Anime_movies::paginate(20);
        return view('clients.animes.movies', compact('animes', 'anime_eposides', 'categories', 'types', 'all_movies'));
    }










    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('admin.animes.create', compact('categories', 'types'));
    }


    public function store(Request $request)
    {
        $path = $request->poster->store('public/images/anime_posters');
        $anime = Anime::create([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name],
            'type_id' => $request->type,
            'subtype_id' => $request->subtype,
            'production_year' => $request->production_year,
            'poster' => $path,
            'rate' => $request->rate,
            'description' => $request->description,
        ]);

        $anime->categories()->syncWithoutDetaching($request->category);


        Anime_seasons::create([
            'season_number' => 1,
            'anime_id' => $anime->id,
            'season_poster' => $path,
            'season_production_year' => $anime->production_year,

        ]);

        toastr()->success('data inserted successfullly');
        return redirect()->route('animes.admin');
    }


    public function show($id)
    {
        $serie = Anime::find($id);
        return view('admin.animes.show', compact('serie'));
    }


    public function clientShow($id)
    {
        $serie = Anime::find($id);
        $categories = Category::all();
        $comments = AnimeComment::all()->where('anime_id', $id);
        $season =  $serie->seasons->first();
        $serie_ids = $serie->categories->pluck('id');
        $all_movies = Movie::all();
        $types = Type::all();

        $similarEposides = Anime::whereHas('categories', function ($query) use ($serie_ids) {
            return $query->whereIn('categories.id', $serie_ids);
        })->where('id', '!=', $serie->id)->get();

        return view('clients.animes.show', compact('serie', 'season', 'similarEposides', 'all_movies', 'categories', 'types', 'comments'));
    }











    public function edit($id)
    {
        $serie = Anime::find($id);
        $categories = Category::all();
        $types = Type::all();
        return view('admin.animes.edit', compact('serie', 'categories', 'types'));
    }


    public function update(Request $request, $id)
    {
        $serie = Anime::find($id);
        if ($request->has('poster')) {
            $path = $request->poster->store('public/images/anime_posters');
        } else {
            $path = $serie->poster;
        }
        $serie->update([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name],
            'type_id' => $request->type,
            'subtype_id' => $request->subtype,

            'production_year' => $request->production_year,
            'poster' => $path,
            'rate' => $request->rate,
            'description' => $request->description,
        ]);
        $serie->categories()->sync($request->category);
        toastr()->success('data updated successfullly');
        return redirect()->route('animes.admin');
    }


    public function destroy($id)
    {
        $serie = Anime::find($id);
        $serie->delete();
        toastr()->success('data deleted successfullly');
        return redirect()->route('animes.admin');
    }
}
