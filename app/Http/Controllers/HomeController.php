<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            return view('admin.dashboard');
        } else {
            return redirect()->route('clients');
        }
    }
}
