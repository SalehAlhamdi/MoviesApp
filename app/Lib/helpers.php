<?php

if (!function_exists('getDuration')){

    function getDuration(string $full_video_path)
    {
        $getID3 = new getID3;
        $file = $getID3->analyze($full_video_path);
        $playtime_seconds = $file['playtime_seconds'];
        $duration = date('H:i:s.v', $playtime_seconds);

        return format_duration($duration);
        }
    function format_duration(string $duration){

        // The base case is A:BB
        if($duration[0] == '0' && $duration[1]=='0'){
            return substr($duration,4,1)  ;
        }
    }
    function getResolution(string $full_video_path){
        $getID3 = new getID3;
        $file = $getID3->analyze($full_video_path);
        $dimensions=$file['video']['resolution_y'];
        return $dimensions;

    }
}
