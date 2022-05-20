<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;
    protected $fillable=[
        'ep_num',
        'season',
        'vidPath',
        'tv_shows_id'
    ];

    public function tvShows(){
        return $this->belongsTo(TvShows::class);
    }
}
