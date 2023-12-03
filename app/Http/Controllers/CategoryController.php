<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Anime_movies;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Type;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'Category_group.*.name' => 'required|unique:categories,name',
        ]);



        $requests = $request->Category_group;



        foreach ($requests as $item) {

            $categories = new Category();

            $categories->name = $item['name'];

            $categories->save();
        }
        toastr()->success('Data has been inserted successfully!');
        return redirect('categories');
    }


    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show', compact('category'));
    }

    public function clientShow($id)
    {
        $category = Category::find($id);
        $types = Type::all();
        $all_movies = Movie::all();

        $categories = Category::all();
        $series = $category->series->take(6);
        $movies = $category->movies->take(6);
        $tvs = $category->tvs->take(6);
        $animes = $category->animes->take(6);
        $paginatedMovies = $category->movies()->paginate(35);
        return view('clients.categories.show', compact('categories', 'series', 'movies', 'category', 'paginatedMovies', 'types' , 'all_movies' , 'tvs' , 'animes'));
    }



    public function clientSeriesShow($id)
    {
        $category = Category::find($id);
        $all_movies = Movie::all();
        $types = Type::all();
        $categories = Category::all();
        $series = $category->series->take(9);
        $movies = $category->movies->take(6);
        $tvs = $category->tvs->take(6);
        $animes = $category->animes->take(6);
        $paginatedSeries = $category->series()->paginate(35);
        return view('clients.categories.series', compact('categories', 'series', 'movies', 'category', 'paginatedSeries', 'all_movies', 'types','tvs','animes'));
    }
    public function clientTvsShow($id)
    {
        $category = Category::find($id);
        $all_movies = Movie::all();
        $types = Type::all();
        $categories = Category::all();
        $series = $category->series->take(9);
        $movies = $category->movies->take(6);
        $tvs = $category->tvs->take(6);
        $animes = $category->animes->take(6);
        $paginatedSeries = $category->tvs()->paginate(35);
        return view('clients.categories.tvs', compact('categories', 'series', 'movies', 'category', 'paginatedSeries', 'all_movies', 'types','tvs','animes'));
    }
    public function clientAnimesShow($id)
    {
        $category = Category::find($id);
        $all_movies = Movie::all();
        $types = Type::all();
        $categories = Category::all();
        $series = $category->series->take(9);
        $movies = $category->movies->take(6);
        $tvs = $category->tvs->take(6);
        $animes = $category->animes->take(6);
        $paginatedSeries = $category->animes()->paginate(35);
        return view('clients.categories.animes', compact('categories', 'series', 'movies', 'category', 'paginatedSeries', 'all_movies', 'types','tvs','animes'));
    }




    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if (Category::where('name', $request->name)->exists()) {
            return back()->with('message', 'already exists');
        } else {
            $category = Category::find($id);
            $category->update([
                'name' =>  $request->name
            ]);

            toastr()->success('Data has been updated successfully!');

            return redirect('categories');
        }
    }




    public function destroy($id)
    {
        $category = Category::find($id);

        foreach ($category->movies as $item) {
            $movie = Movie::where('id', $item->id);
            $movie->delete();
        }

        foreach ($category->anime_movies as $item) {
            // $movie = Anime_movies::where('id', $item->id);
            $item->delete();
        }


        foreach ($category->series as $item) {
            $serie = Serie::where('id', $item->id);
            $serie->delete();
        }
        foreach ($category->animes as $item) {
            $anime = Anime::where('id', $item->id);
            $anime->delete();
        }

        $category->movies()->detach();
        $category->series()->detach();
        $category->animes()->detach();
        $category->anime_movies()->detach();


        $category->delete();

        return redirect('categories');
    }
}
