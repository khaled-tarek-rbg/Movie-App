<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\TV;
use App\Models\TV_eposides;
use App\Models\TV_seasons;
use App\Models\TVComment;
use App\Models\Type;
use Illuminate\Http\Request;

class TVController extends Controller
{

    public function index()
    {
        $tvs = TV::all();
        return view('admin.tv_shows.index', compact('tvs'));
    }

    public function all_shows()
    {
        $eposides = TV_eposides::orderBy('id', 'DESC')->take(15)->get();
        $types = Type::all();
$all_movies =Movie::all();
        $categories = Category::all();
        $paginated_shows = TV::paginate(20);

        return view('clients.tv.all_shows', compact('eposides', 'types', 'categories', 'paginated_shows','all_movies'));
    }





    public function create()
    {

        $categories = Category::all();
        return view('admin.tv_shows.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'name_en' => 'required|string|min:3|max:40',
            'name_ar' => 'required|string|min:3|max:40',
            'poster' => 'required|image|mimes:png,jpg,jpeg,webp',
            'category' => 'required',
            'type' => 'required',
            'production_year' => 'required'

        ]);

        if (TV::where('name->en', $request->name_en)->where('name->ar', $request->name_ar)->where('production_year', $request->production_year)->exists()) {
            return back()->with('message', 'already exists');
        } else {
            $path = $request->poster->store('public/images/tv_posters');
            $tv = TV::create([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'production_year' => $request->production_year,
                'country' => $request->country,
                'poster' => $path,
                'type_id' => $request->type,
                'subtype_id' => $request->subType,
            ]);
            $tv->categories()->syncWithoutDetaching($request->category);


            TV_seasons::create([
                'season_number' => 1,
                'season_poster' => $path,
                'season_production_year' => $request->production_year,
                'tv_id' => $tv->id
            ]);

            toastr()->success('data inserted successfully');
            return redirect()->route('tvs');
        }
    }


    public function show($id)
    {
        $tv = Tv::find($id);
        return view('admin.tv_shows.show', compact('tv'));
    }

    public function clientShow($id)
    {
        $tv = Tv::find($id);
        $season = $tv->seasons->first();
        $categories = Category::all();
        $all_movies =Movie::all();


        $tvCategories = $tv->categories->pluck('id');


        $similartvs = TV::whereHas('categories', function ($query) use ($tvCategories) {
            return $query->whereIn('categories.id', $tvCategories);
        })->where('id', '!=', $tv->id)->get();


        $comments = TVComment::all()->where('tv_id', $id);
        $types = Type::all();

        return view('clients.tv.show', compact('tv', 'types', 'comments', 'season', 'similartvs', 'categories','all_movies'));
    }












    public function edit($id)
    {
        $serie = Tv::find($id);
        $categories = Category::all();
        return view('admin.tv_shows.edit', compact('serie', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name_en' => 'required|string|min:3|max:40',
            'name_ar' => 'required|string|min:3|max:40',
            // 'poster' => 'required|image|mimes:png,jpg,jpeg',
            'category' => 'required',
            'production_year' => 'required',
            'type'=>'required'

        ]);

        $tv = Tv::find($id);
        if ($request->has('poster')) {
            $path = $request->poster->store('public/images/tv_posters');
        } else {
            $path = $tv->poster;
        }
        $tv->update([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'production_year' => $request->production_year,
            'country' => $request->country,
            'poster' => $path,
            'type_id' => $request->type,
            'subtype_id' => $request->subType,

        ]);
        $tv->categories()->sync($request->category);

        toastr()->success('data updated successfully');
        return redirect()->route('tvs');
    }


    public function destroy($id)
    {
        $tv = Tv::find($id);
        $tv->delete();
        toastr()->success('data deleted successfully');
        return redirect('tvs');
    }
}
