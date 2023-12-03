<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Anime_movies;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Sub_serie;
use App\Models\TV;
use App\Models\TV_eposides;
use App\Models\Type;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $types = Type::all();
        $all_movies = Movie::all();

        $movies = Movie::orderBy('id', 'DESC')->take(8)->get();
        $eposides = Sub_serie::orderBy('id', 'DESC')->take(4)->get();
        $tveposides = TV_eposides::orderBy('id', 'DESC')->take(4)->get();
        $paginatedEposides = Sub_serie::orderBy('id', 'desc')->paginate(30);



        return view('clients.index', compact('categories', 'movies', 'eposides', 'paginatedEposides' ,'types' , 'tveposides','all_movies'));
    }





    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }
    public function movieSearch(Request $request)
    {
        if ($request->movie_name !== null) {
            $all_movies = Movie::all();

            $movies = Movie::where('name->en', 'like', '%' . $request->movie_name . '%')->orWhere('name->ar', 'like', '%' . $request->movie_name . '%')->get();

            $anime_movies = Anime_movies::where('name->en', 'like', '%' . $request->movie_name . '%')->orWhere('name->ar', 'like', '%' . $request->movie_name . '%')->get();


            $series = Serie::where('name->en', 'like', '%' . $request->movie_name . '%')->orWhere('name->ar', 'like', '%' . $request->movie_name . '%')->get();


            $animes = Anime::where('name->en', 'like', '%' . $request->movie_name . '%')->orWhere('name->ar', 'like', '%' . $request->movie_name . '%')->get();


            $tv_shows = TV::where('name->en', 'like', '%' . $request->movie_name . '%')->orWhere('name->ar', 'like', '%' . $request->movie_name . '%')->get();

            if (count($movies) > 0 || count($series) > 0 || count($tv_shows) > 0 || count($animes) > 0 || count($anime_movies)) {

                $types = Type::all();

                $categories = Category::all();
                return view('clients.search', compact('movies', 'anime_movies', 'series', 'categories', 'animes', 'tv_shows' , 'types' ,'all_movies'));
            } else {
                toastr()->error('there is no such that film');
                return back();
            }
        } else {
            return back();
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
