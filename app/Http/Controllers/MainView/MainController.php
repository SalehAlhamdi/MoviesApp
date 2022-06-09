<?php

namespace App\Http\Controllers\MainView;

use App\Http\Controllers\Controller;
use App\Models\Genres;
use App\Models\Movies;
use App\Models\TvShows;

class MainController extends Controller
{
    public function main(){
        $recentMovies = Movies::latest()->take(6)->get();
        $tvShows=TvShows::latest()->with('episodes')->take(8)->get();
        $movies=Movies::all()->take(8);
        return view('movie.home', compact('recentMovies','movies','tvShows'));
    }

    public function all_movies(){
        $movies=Movies::with('types')->latest()->paginate(8);
        return view('movie.singlePage',compact('movies'));
    }

    public function all_tvShows(){
        $tvShows=TvShows::with('episodes','types')->latest()->paginate(8);
        return view('movie.singlePage',compact('tvShows'));
    }
    public function all_animes(){
        $tvShows=TvShows::with('types')->latest()->paginate(8);
        return view('movie.singlePage',compact('tvShows'));
    }

    public function movie_details( $id){
        $movie=Movies::where('id',$id)->with('genres')->firstOrFail();
        $movies=Movies::latest()->take(8)->get();
        return view('movie.details',compact('movie','movies'));
    }

    public function tvShow_details( $id){
        $tvShow=TvShows::where('id',$id)->with('episodes','genres','types')->firstOrFail();
        $tvShows=TvShows::latest()->take(8)->get();
        return view('movie.details',compact('tvShow','tvShows'));
    }

}
