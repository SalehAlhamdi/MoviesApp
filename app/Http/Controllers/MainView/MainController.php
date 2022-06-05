<?php

namespace App\Http\Controllers\MainView;

use App\Http\Controllers\Controller;
use App\Models\Genres;
use App\Models\Movies;
use App\Models\TvShows;

class MainController extends Controller
{
    public function main(){

        $movies = Movies::all();
        $tvShows=TvShows::all();
        $genres=Genres::all();
        $years=array();
        foreach ($movies as $movie){
            $years[]=$movie->releaseDate;
        }
        $years=array_unique($years);
        return view('movie.home', compact('movies','tvShows','genres','years'));
    }
}
