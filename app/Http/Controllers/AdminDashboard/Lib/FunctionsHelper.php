<?php

namespace App\Http\Controllers\AdminDashboard\Lib;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function public_path;

class FunctionsHelper
{
    public function update_files(string $path,string $fileType,string $fileName,Request $request){

        if ($request->hasFile($fileType)){
            if (!file_exists($path.$request->image->getClientOriginalName())){
                File::delete($path.$fileName);
            }

            $file=$request->file($fileType);
            $fileName=time().'.'.$file->extension();
            $file->move(public_path($path),$fileName);
        }

    }
}
