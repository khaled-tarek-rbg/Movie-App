<?php

namespace App\Http\Controllers;

use App\Models\Anime_movies;
use App\Models\Anime_Movies_Comment;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Type;
use Illuminate\Http\Request;

class AnimeMoviesController extends Controller
{

    public function index()
    {
        //
    }
    public function adminIndex()
    {
        $anime_movies = Anime_movies::all();
        return view('admin.anime_films.index', compact('anime_movies'));
    }


    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        $animes = Anime_movies::all();
        return view('admin.anime_films.create', compact('categories', 'types' , 'animes'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
            'poster' => 'required',
            'country' => 'required',
            'rate' => 'required | numeric',
            'duration' => 'required',
            'production_year' => 'required',
            'category' => 'required',
            'type' => 'required',
        ]);

        if (Anime_movies::where('name->en', $request->name_en)->where('name->ar', $request->name_ar)->where('production_year', $request->production_year)->where('type_id', $request->type)->where('country', $request->country)->exists()) {
            return back()->with('message', 'already exists');
        } else {
            $path = $request->poster->store('public/images/anime_posters');
            $anime_movie = Anime_movies::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],

                'description' => $request->descripion,
                'poster' => $path,
                'rate' => $request->rate,
                'country' =>  $request->country,
                'type_id' =>  $request->type,
                'subtype_id' =>  $request->subtype,
                'duration' =>  $request->duration,
                'also_known_as' =>  $request->also_known_as,
                'production_year' => $request->production_year,




            ]);
            $anime_movie->categories()->syncWithoutDetaching($request->category);
            toastr()->success('Data succeessfully inserted');

            return redirect()->route('movies.admin.animes');
        }
    }


    public function show($id)
    {
        $movie = Anime_movies::find($id);

        $categories = Category::all();

        $all_movies = Movie::all();
        $types = Type::all();

        $cat_id = $movie->categories->pluck('id');

        $similar_movies = Anime_movies::whereHas('categories', function ($query)  use ($cat_id) {
            return $query->whereIn('categories.id', $cat_id);
        })->where('id', '!=', $movie->id)->get();


        $comments = Anime_Movies_Comment::all()->where('anime_movie_id', $id);

        return view('clients.animes.anime_movies_show', compact('movie', 'comments', 'categories', 'all_movies', 'types', 'similar_movies'));
    }

    public function adminShow($id)
    {
        $movie = Anime_movies::find($id);

        return view('admin.anime_films.show', compact('movie'));
    }


    public function edit($id)
    {
        $movie = Anime_movies::find($id);
        $categories = Category::all();
        $types = Type::all();

        return view('admin.anime_films.edit', compact('movie', 'categories', 'types'));
    }


    public function update(Request $request, $id)
    {
        $movie = Anime_movies::find($id);
        if ($request->has('poster')) {
            $path = $request->poster->store('public/images/anime_posters');
        } else {
            $path = $movie->poster;
        }


        $movie->update([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],

            'description' => $request->descripion,
            'poster' => $path,
            'rate' => $request->rate,
            'country' =>  $request->country,
            'duration' =>  $request->duration,
            'type_id' => $request->type,
            'also_known_as' =>  $request->also_known_as,
            'production_year' => $request->production_year,


        ]);
        $movie->categories()->sync($request->category);

        toastr()->success('data updated successfully');
        return redirect()->route('movies.admin.animes');
    }





    public function destroy($id)
    {
        $movie = Anime_movies::find($id);
        $movie->delete();
        toastr()->success('data deleted successfully');
        return redirect()->route('movies.admin.animes');
    }
}
