<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];

    public function movies(){
        return $this->belongsToMany(Movies::class);
    }

    public function tvShows(){
        return $this->belongsToMany(TvShows::class);
    }
}
