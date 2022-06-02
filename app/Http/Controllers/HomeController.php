<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\TvShows;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $movies = Movies::all();
        $tvShows=TvShows::all();

        return view('admin.index', compact('movies','tvShows'));
    }
}
