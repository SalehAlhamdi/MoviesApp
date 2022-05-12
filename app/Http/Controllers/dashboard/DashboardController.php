<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Genres;
use App\Models\Movies;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        session()->put('collapse','show');

    }

    public function index()
    {
        $movies=Movies::all();
        return response(view('admin.index',compact('movies')));
    }

    public function create_movie()
    {
        $genres=Genres::all();
        return response(view('admin.movies.create')->with('genres',$genres));
    }


    public function show_movies(){

        $movies=Movies::with('genres')->get();
        return response(view('admin.movies.show_movies',compact('movies')));
    }

    public function show_deleted_movies(){
        $movies=Movies::onlyTrashed()->get();
        return response(view('admin.movies.show_deleted_movies',compact('movies')));
    }

    public function movie_info($id){
        $movie=Movies::where('id',$id)->firstOrFail();
        return view('admin.movies.movie_info',compact('movie'));
    }

    public function update_movie($id){
        $genres=Genres::all();
        $movies=Movies::where('id',$id)->with('genres')->firstOrFail();

        return response(view('admin.movies.create',compact('movies','genres')));
    }
}
