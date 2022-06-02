<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\test;
use App\Models\Genres;
use App\Models\Movies;
use App\Models\TvShows;
use App\Models\Types;
use Illuminate\Http\Request;

class TvShowViewController extends Controller
{
    public function __construct()
    {
        session()->put('collapse', 'show');

    }

    ///////////////////////////////
    ///Functions for Movies Section
    ///////////////////////////////

    public function create_tvShow()
    {
        $genres = Genres::all();
        $types = Types::all();
        return response(view('admin.tvShow.create_tv_show', compact('types', 'genres')));
    }

    public function create_episode(){
        $tvShows=TvShows::all();
        return response(view('admin.tvshow.adding_ep_tv_show',compact('tvShows')));
    }

    public function show_tvShow()
    {
        $tvShows = TvShows::with('genres', 'types','episodes')->get();
        return response(view('admin.tvShow.show_tv_show', compact('tvShows')));
    }

    public function show_deleted_tvShow()
    {
        $tvShows = TvShows::onlyTrashed()->get();
        return response(view('admin.tvShow.show_deleted_tv_show', compact('tvShows')));
    }

    public function tvShow_info($id)
    {
        $tvShow = TvShows::where('id', $id)->firstOrFail();
        return view('admin.tvShow.tv_show_info', compact('tvShow'));
    }

    public function update_tvShow($id)
    {
        $types = Types::all();
        $genres = Genres::all();
        $tvShow = TvShows::where('id', $id)->with('genres', 'types','episodes')->firstOrFail();
        return response(view('admin.tvShow.tv_show_info', compact('tvShow', 'genres', 'types')));
    }
}
