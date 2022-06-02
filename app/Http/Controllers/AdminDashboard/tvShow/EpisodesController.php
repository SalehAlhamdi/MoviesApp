<?php

namespace App\Http\Controllers\AdminDashboard\tvShow;

use App\Http\Controllers\Controller;
use App\Http\Requests\tvshow\EpisodesRequest;
use App\Models\Episodes;
use Illuminate\Support\Facades\File;
use function asset;
use function back;
use function public_path;

class EpisodesController extends Controller
{

    public function store_ep(EpisodesRequest $request){
        $ep_name='';
        if ($request->hasFile('ep_video')) {
            $ep = $request->file('ep_video');
            $ep_name = time() . '.' . $ep->extension();
            $ep->move(public_path('videos/TvShows/'), $ep_name);
        }
        $ep=Episodes::create([
            'tv_shows_id'=>$request->select_ep,
            'season'=>$request->select_season,
            'ep_num'=>$request->ep_num,
            'vidPath'=>$ep_name
        ]);

        return back()->with('success_add_ep','تم أضافة الحلقة بنجاح');
    }

    public function delete_ep($id){
        $episode=Episodes::where('id',$id)->firstOrFail();

        if (file_exists(asset('videos/TvShows/'.$episode->vidPath))){
            File::delete(asset('videos/TvShows/'.$episode->vidPath));
        }
        $episode->delete();

        return back()->with('deleted_ep_success','تم حذف الحلقة بنجاح');

    }
}
