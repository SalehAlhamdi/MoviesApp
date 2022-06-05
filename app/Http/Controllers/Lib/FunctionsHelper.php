<?php

namespace App\Http\Controllers\Lib;

use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function public_path;

class FunctionsHelper
{
    public function all_years(){
        $genres=Genres::all();
        $yeras=array_unique($genres->years);
        return $yeras;
    }
}
