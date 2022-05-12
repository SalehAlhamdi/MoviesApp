<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
      'title','description','releaseDate' ,'imgPath','movPath'
    ];

    public function genres(){
        return $this->belongsToMany(Genres::class);
    }

    public function hasGenre($id){
        return in_array($id,$this->genres->pluck('id')->toArray());

    }

}




