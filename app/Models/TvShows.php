<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TvShows extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'title','description' ,'imgPath','vidPath','season'
    ];
    public function genres(){
        return $this->belongsToMany(Genres::class);
    }

    public function types(){
        return $this->belongsToMany(Types::class);
    }

    public function episodes(){
        return $this->hasMany(Episodes::class,'tv_shows_id');
    }

    public function checkIfHas($id,$object){
        return in_array($id,$this->$object->pluck('id')->toArray());

    }


}
