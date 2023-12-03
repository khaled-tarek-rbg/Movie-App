<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Season;
use App\Models\Serie;
use App\Models\Serie_Comment;
use App\Models\Sub_serie;
use App\Models\Type;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index()
    {
        $series = Serie::all();

        return view('admin.series.index', compact('series'));
    }


   public function newSeries()
    {
        $new_series = Serie::where('production_year', '=', 2022)->paginate(20);
        $eposides = Sub_serie::orderBy('id', 'desc')->take(15)->get();
        $categories = Category::all();
        $all_movies = Movie::all();
        $types = Type::all();


        return view('clients.series.new', compact('new_series',  'categories', 'eposides', 'all_movies', 'types'));
    }
    public function oldSeries()
    {
        $old_series = Serie::where('production_year', '!=', 2022)->paginate(20);
        $eposides = Sub_serie::orderBy('id', 'desc')->take(15)->get();
        $categories = Category::all();
        $all_movies = Movie::all();
        $types = Type::all();

        return view('clients.series.old', compact('old_series',  'categories', 'eposides', 'all_movies', 'types'));
    }


    public function bestSeries()
    {
        $best_series = Serie::orderBy('serie_views', 'DESC')->paginate(20);
        $eposides = Sub_serie::orderBy('id', 'desc')->take(15)->get();
        $categories = Category::all();
        $all_movies = Movie::all();
        $types = Type::all();

        return view('clients.series.best', compact('best_series',  'categories', 'eposides',  'all_movies', 'types'));
    }


    public function topSeries()
    {
        $top_series = Serie::orderBy('rate', 'DESC')->paginate(20);
        $eposides = Sub_serie::orderBy('id', 'desc')->take(15)->get();
        $categories = Category::all();
        $all_movies = Movie::all();
        $types = Type::all();


        return view('clients.series.top_rated', compact('top_series',  'categories', 'eposides', 'all_movies', 'types'));
    }





    public function create()

    {
        $categories = Category::all();
        return view('admin.series.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [

            'serie_name' => 'required|string|min:3|max:40',
            'serie_name_ar' => 'required|string|min:3|max:40',
            'poster' => 'required|image|mimes:png,jpg,jpeg',
            'category' => 'required',
            'type' => 'required',
            'serie_rate' => 'required|numeric',
            'production_year' => 'required'

        ]);

        if (Serie::where('name->en', $request->serie_name)->where('name->ar', $request->serie_name_ar)->where('production_year', $request->production_year)->where('type_id', $request->type)->exists()) {
            return back()->with('message', 'already exists');
        }

        $path = $request->poster->store('public/images/series_posters');
        $serie = Serie::create([
            'name' => ['ar' => $request->serie_name_ar, 'en' => $request->serie_name],
            'description' => $request->description,
            'production_year' => $request->production_year,
            'poster' => $path,
            'type_id' => $request->type,
            'subtype_id' => $request->subType,
            'rate' =>   $request->serie_rate

        ]);
        $serie->categories()->syncWithoutDetaching($request->category);
        Season::create([
            'season_number' => 1,
            'serie_id' => $serie->id,
            'season_poster' => $path,
            'season_production_year' => $serie->production_year
        ]);


        toastr()->success('inserted successfully');
        return redirect()->route('series');
    }


    public function clientShow($id)
    {
        $serie = Serie::find($id);
        $all_movies = Movie::all();


        $comments = Serie_Comment::all()->where('serie_id', $id);

        Serie::where('id', $id)->increment('serie_views');

        $season =  $serie->seasons->first();
        $categories = Category::all();
        $types = Type::all();





        $serie_ids = $serie->categories->pluck('id');

        $similarEposides = Serie::whereHas('categories', function ($query) use ($serie_ids) {
            return $query->whereIn('id', $serie_ids);
        })->where('id', '!=', $serie->id)->get();


        return view('clients.series.show', compact('serie', 'similarEposides', 'season', 'categories', 'comments', 'types' , 'all_movies'));
    }











    public function show($id)
    {
        $serie = Serie::find($id);
        $categories = Category::all();
        return view('admin.series.show', compact('serie', 'categories'));
    }


    public function edit($id)
    {
        $serie = Serie::find($id);
        $types = Type::all();
        $categories = Category::all();

        return view('admin.series.edit', compact('serie', 'categories', 'types'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'serie_name' => 'required|string|min:3|max:40',
            'serie_name_ar' => 'required|string|min:3|max:40',
            'category' => 'required',
            'serie_rate' => 'required|numeric',
            'production_year' => 'required',
            'type' => 'required'
        ]);


        $serie = Serie::find($id);

        $serie->update([
            'name' => ['ar' => $request->serie_name_ar, 'en' => $request->serie_name],
            'description' => $request->description,
            'production_year' => $request->production_year,
            'rate' =>   $request->serie_rate,
            'type_id' =>  $request->type,
            'subtype_id' =>  $request->subtype,

        ]);
        $serie->categories()->sync($request->category);

        toastr()->success('Data has been updated successfully!');
        return redirect()->route('series');
    }


    public function destroy(Serie $serie, $id)
    {
        $serie = Serie::find($id);
        $serie->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('series');
    }
}
