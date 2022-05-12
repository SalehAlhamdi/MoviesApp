<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\movie\StoreMovieRequest;
use App\Http\Requests\movie\UpdateRequest;
use App\Models\Genres;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        if ($request->hasFile('movie')) {
            $mov = $request->file('movie');
            $movname = time() . '.' . $mov->extension();
            $mov->move(public_path('movies'), $movname);
        }
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

    public function update_movie($id,UpdateRequest $request){
        $movie = Movies::where('id',$id)->firstOrFail();

        $imgname=$movie->imgPath;
        $movname=$movie->movPath;

        //images
        if ($request->hasFile('image')){
            if (!asset('images/'.$request->image) != asset('images/'.$movie->imgPath)){
                File::delete(asset('images/'.$movie->imgPath));
            }

            $img=$request->file('image');
            $imgname=time().'.'.$img->extension();
            $img->move(public_path('images'),$imgname);
        }

        //movies
        if ($request->hasFile('movie')) {
            if (!asset('images/'.$request->movie) != asset('images/'.$movie->movPath)){
                File::delete(asset('images/'.$movie->movPath));
            }

            $mov = $request->file('movie');
            $movname = time() . '.' . $mov->extension();
            $mov->move(public_path('movies'), $movname);
        }

        //sync to delete unselected genres from db  and keep/adding new genres.
        if ($request->has('genres')){
            $movie->genres()->sync($request->genres);

        }

        $movie->update([
            'title'=>$request->movie_title,
            'description'=>$request->movie_description,
            'releaseDate'=>$request->movie_rela,
            'movPath'=>$movname,
            'imgPath'=>$imgname
        ]);


        return back()->with('success_add_movie','تم تحديث الفيلم بنجاح')->with('genres');
    }

}
