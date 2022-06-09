<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
      'title','description','releaseDate' ,'imgPath','movPath','movie_type'
    ];

    public function genres(){
        return $this->belongsToMany(Genres::class);
    }

    public function checkIfHas($id,$object){
        return in_array($id,$this->$object->pluck('id')->toArray());

    }

    public function types(){
        return $this->belongsToMany(Types::class);
    }


}




