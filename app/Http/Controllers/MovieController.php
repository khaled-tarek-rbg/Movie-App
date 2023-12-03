<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{


    public function index()
    {

        $all_movies = Movie::all();
        $movies = Movie::orderBy('id', 'desc')->take(15)->get();

        $paginatedMovies = Movie::where('production_year', '=', 2022)->paginate(20);
        $categories = Category::all();
        $types = Type::all();
        return view('clients.films.index', compact('paginatedMovies', 'categories', 'all_movies' , 'types','movies'));
    }

    public function oldMovies()
    {

        $all_movies = Movie::all();

        $types = Type::all();

        $movies = Movie::orderBy('id', 'desc')->take(15)->get();
        $paginatedMovies = Movie::where('production_year', '!=', 2022)->paginate(20);
        $categories = Category::all();
        return view('clients.films.old', compact('movies', 'paginatedMovies', 'categories', 'types' , 'all_movies'));
    }
    public function productionYear(Request $request)
    {
        $types = Type::all();
        $all_movies = Movie::all();


        $movies = Movie::orderBy('id', 'desc')->take(15)->get();
        $paginatedMovies = Movie::where('production_year', '=', $request->year)->paginate(20);
        $categories = Category::all();
        return view('clients.films.production_year', compact('movies', 'paginatedMovies', 'categories', 'types' , 'all_movies'));
    }
    public function country(Request $request)
    {
        $types = Type::all();
        $all_movies = Movie::all();

        $movies = Movie::orderBy('id', 'desc')->take(15)->get();
        $paginatedMovies = Movie::where('country', '=', $request->country)->paginate(20);
        $categories = Category::all();
        return view('clients.films.country', compact('movies', 'paginatedMovies', 'categories', 'types' , 'all_movies'));
    }



    public function bestMovies()
    {
        $movies = Movie::orderBy('id', 'desc')->take(15)->get();
        $all_movies = Movie::all();


        $paginatedMovies = Movie::orderBy('movie_views', 'DESC')->paginate(20);
        $categories = Category::all();
        $types = Type::all();
        return view('clients.films.best', compact('movies', 'paginatedMovies', 'categories','types' ,'all_movies'));
    }

    public function topMovies()
    {
        $all_movies = Movie::all();

        $movies = Movie::orderBy('id', 'desc')->take(15)->get();
        $types = Type::all();

        $paginatedMovies = Movie::orderBy('rate', 'DESC')->paginate(20);
        $categories = Category::all();
        return view('clients.films.top_rated', compact('movies', 'paginatedMovies', 'categories', 'types' ,'all_movies' ));
    }


    public function adminIndex()
    {
        $movies = Movie::with('categories')->get();

        return view('admin.films.index', compact('movies'));
    }



    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('admin.films.create', compact('categories', 'types'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'movie_name' => 'required',
            'movie_name_ar' => 'required',
            'poster' => 'required',
            'country' => 'required',
            'movie_rate' => 'required | numeric',
            'duration' => 'required',
            'production_year' => 'required',
            'category' => 'required',
            'type' => 'required',
        ]);

        if (Movie::where('name->en', $request->movie_name)->where('name->ar', $request->movie_name_ar)->where('production_year', $request->production_year)->where('type_id', $request->type)->where('country', $request->country)->exists()) {
            return back()->with('message', 'already exists');
        } else {


            $path = $request->poster->store('public/images/posters');

            $movie = Movie::create([
                'name' => ['en' => $request->movie_name, 'ar' => $request->movie_name_ar],

                'description' => $request->descripion,
                'poster' => $path,
                'rate' => $request->movie_rate,
                'country' =>  $request->country,
                'type_id' =>  $request->type,
                'subtype_id' =>  $request->subtype,
                'duration' =>  $request->duration,
                'also_known_as' =>  $request->also_known_as,
                'production_year' => $request->production_year,
                // store watch servers



                // store download servers

            ]);
            $movie->categories()->syncWithoutDetaching($request->category);


            toastr()->success('Data succeessfully inserted');

            return redirect()->route('movies.admin');
        }
    }


    public function show($id)
    {
        // Carbon::setLocale('ar');

        $movie = Movie::find($id);
        $types = Type::all();
        $all_movies = Movie::all();


        $comments = Comment::all()->where('movie_id', $id);
        Movie::where('id', $id)->increment('movie_views');
        $categories = Category::all();
        $cat_ids = $movie->categories->pluck('id');

        $similarMovies = Movie::whereHas('categories', function ($query) use ($cat_ids) {
            return $query->whereIn('id', $cat_ids);
        })->where('id', '!=', $movie->id)->get();

        return view('clients.films.show', compact('movie', 'categories', 'similarMovies', 'comments', 'types','all_movies'));
    }








    public function adminShow(Movie $movie, $id)
    {
        $movie = Movie::find($id);

        return view('admin.films.show', compact('movie'));
    }


    public function edit(Movie $movie, $id)
    {
        $movie = Movie::find($id);
        $categories = Category::all();
        $types = Type::all();

        return view('admin.films.edit', compact('movie', 'categories', 'types'));
    }


    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($request->has('poster')) {
            $path = $request->poster->store('public/images/posters');
        } else {
            $path = $movie->poster;
        }


        $movie->update([
            'name' => ['en' => $request->movie_name, 'ar' => $request->movie_name_ar],

            'description' => $request->descripion,
            'poster' => $path,
            'rate' => $request->movie_rate,
            'country' =>  $request->country,
            'duration' =>  $request->duration,
            'type_id' => $request->type,
            'subtype_id' =>  $request->subtype,

            'also_known_as' =>  $request->also_known_as,
            'production_year' => $request->production_year,
            'film_url' => str_replace(' ', '', $request->server_1_url),

        ]);
        $movie->categories()->sync($request->category);
        toastr()->success('updated successfully');


        return redirect()->route('movies.admin');
    }




    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        toastr()->success('deleted successfully');
        return redirect()->route('movies.admin');
    }
}
