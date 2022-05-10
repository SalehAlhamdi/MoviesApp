<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\movie\StoreMovieRequest;
use App\Models\Genres;
use App\Models\Movies;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function store_movie(StoreMovieRequest $request){
        $imgname='';
        $movname='';
        if ($request->hasFile('image')){
            $img=$request->file('image');
            $imgname=time().'.'.$img->extension();
            $img->move(public_path('images'),$imgname);
        }
        if ($request->hasFile('movie'))
            $mov=$request->file('movie');
            $movname=time().'.'.$mov->extension();
            $mov->move(public_path('movies'),$movname);

        $movies=Movies::create([
           'title'=>$request->movie_title,
            'description'=>$request->movie_description,
            'releaseDate'=>$request->movie_rela,
            'imgPath'=>$imgname,
            'movPath'=>$movname,
        ]);


        $movies->genres()->attach($request->genres);

        return back()->with('success_add_movie','تم أضافة الفيلم بنجاح');
    }
    public function delete_movie($id){
        $movie=Movies::withTrashed()->where('id', $id)->firstOrFail();
        if($movie->trashed()){
            $movie->forceDelete();
            return back()->with('movie_prem_deleted','تم حذف الفيلم نهائياً بنجاح');

        }

        else{
            $movie->delete();
            return back()->with('movie_deleted','تم حذف الفيلم بنجاح');
        }
    }


    public function restore_trashed_movies($id){
        $movie=Movies::withTrashed()->where('id', $id)->firstOrFail();
        $movie->restore();
        return back()->with('movie_restored','تم أستعادة الفيلم بنجاح');
    }

}
