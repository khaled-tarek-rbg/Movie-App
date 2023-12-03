<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\TV;
use App\Models\TV_eposides;
use App\Models\TV_eposides_comments;
use App\Models\Type;
use Illuminate\Http\Request;

class TVEposidesController extends Controller
{
    public function index()
    {
        $eposides = TV_eposides::all();
        return view('admin.tv_eposides.index', compact('eposides'));
    }

    public function clientIndex()
    {
        $eposides = TV_eposides::orderBy('id', 'DESC')->take(15)->get();
        $types = Type::all();
        $all_movies = Movie::all();

        $categories = Category::all();
        $paginated_eposides = TV_eposides::paginate(20);
        return view('clients.tv_eposides.index', compact('eposides', 'paginated_eposides', 'types', 'categories','all_movies'));
    }


    public function create()
    {
        return view('admin.tv_eposides.create');
    }

    public function store(Request $request)
    {
        Tv_eposides::create([
            'serie_number' => $request->eposide_number,
            'season_id' => $request->seasons,
            'tv_id' => $request->tvs,


        ]);
        toastr()->success('data inserted');

        return redirect()->route('tvs.admin.eposides');
    }

    public function show($id)
    {
        $eposide = Tv_eposides::find($id);
        return view('admin.tv_eposides.show', compact('eposide'));
    }




    public function clientShow($id)
    {
        $eposide = Tv_eposides::find($id);
        $comments = TV_eposides_comments::all()->where('tv_eposide_id', $id);
        $prevEposide = TV_eposides::where('serie_number', $eposide->serie_number - 1)->where('tv_id', $eposide->tv->id)->where('season_id', $eposide->season->id)->first();
        $nextEposide = TV_eposides::where('serie_number', $eposide->serie_number  + 1)->where('tv_id', $eposide->tv->id)->where('season_id', $eposide->season->id)->first();
        $types = Type::all();

        $all_movies = Movie::all();


        $eposideCategories = $eposide->tv->categories->pluck('id');


        $similarEposides = TV::whereHas('categories', function ($query) use ($eposideCategories) {
            return $query->whereIn('categories.id', $eposideCategories);
        })->where('id', '!=', $eposide->tv->id)->get();


        $categories = Category::all();

        return view('clients.tv_eposides.show', compact('eposide', 'types', 'categories', 'comments', 'prevEposide', 'nextEposide', 'similarEposides' , 'all_movies'));
    }






    public function edit($id)
    {
        $eposide = TV_eposides::find($id);
        return view('admin.tv_eposides.edit', compact('eposide'));
    }

    public function update(Request $request, $id)
    {
        $eposide = TV_eposides::find($id);
        $eposide->update([
            'serie_number' => $request->eposide_number,
            'season_id' => $request->seasons,
            'tv_id' => $request->tvs,
        ]);

        toastr()->success('data updated successfully');

        return redirect()->route('tvs.admin.eposides');
    }
    public function destroy($id)
    {
        $eposide = TV_eposides::find($id);
        $eposide->delete();

        toastr()->success('data deleted successfully');

        return redirect()->route('tvs.admin.eposides');
    }
}
