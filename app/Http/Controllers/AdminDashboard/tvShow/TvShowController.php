<?php

namespace App\Http\Controllers\AdminDashboard\tvShow;
use App\Http\Controllers\Controller;
use App\Http\Requests\tvShow\StoreTvShowRequest;
use App\Http\Requests\tvShow\UpdateTvShowRequest;
use App\Models\TvShows;
use function back;
use function public_path;

class TvShowController extends Controller
{
    public function store_tvShow(StoreTvShowRequest $request){
        $imgname='';
        if ($request->hasFile('image')){
            $img=$request->file('image');
            $imgname=time().'.'.$img->extension();
            $img->move(public_path('images/TvShows'),$imgname);
        }
        $tvShow=TvShows::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'imgPath'=>$imgname,
            'season'=>$request->season
        ]);


        $tvShow->genres()->attach($request->genres);
        $tvShow->types()->attach($request->types);

        return back()->with('success_add_movie','تم أضافة المسلسل بنجاح');
    }
    public function delete_tvShow($id){
        $tvShow=TvShows::withTrashed()->where('id', $id)->firstOrFail();
        if($tvShow->trashed()){
            if (file_exists('images/TvShows/'.$tvShow->imgPath)){
                unlink('images/TvShows/'.$tvShow->imgPath);
            }
            $tvShow->forceDelete();
            return back()->with('tvShow_prem_deleted','تم حذف المسلسل نهائياً بنجاح');

        }

        else{
            $tvShow->delete();
            return back()->with('tvShow_deleted','تم حذف المسلسل بنجاح');
        }
    }


    public function restore_trashed_tvShow($id){
        $tvShow=TvShows::withTrashed()->where('id', $id)->firstOrFail();
        $tvShow->restore();
        return back()->with('tvShow_restored','تم أستعادة المسلسل بنجاح');
    }

    public function update_tvShow($id,UpdateTvShowRequest $request){

        $tvShow = TvShows::where('id',$id)->firstOrFail();

        $imgname=$tvShow->imgPath;

        //images

        if ($request->hasFile('image')){
            if (!file_exists('images/tvShows/'.$request->image->getClientOriginalName())){
                unlink('images/TvShows/'.$tvShow->imgPath);
            }

            $img=$request->file('image');
            $imgname=time().'.'.$img->extension();
            $img->move(public_path('images/tvShows/'),$imgname);
        }


        //sync to delete unselected genres from db  and keep/adding new genres.
        if ($request->has('genres')){
            $tvShow->genres()->sync($request->genres);

        }

        if ($request->has('types')){
            $tvShow->types()->sync($request->types);

        }

        $tvShow->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'imgPath'=>$imgname,
            'season'=>$request->season,

        ]);


        return back()->with('success_updated_tvShow','تم تحديث المسلسل بنجاح')->with('genres');
    }

}
