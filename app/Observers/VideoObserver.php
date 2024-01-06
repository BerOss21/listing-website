<?php

namespace App\Observers;

use App\Models\Video;

class VideoObserver
{
    public function creating(Video $video)
    {
        $pattern = '/[?&]v=([a-zA-Z0-9_-]{11})/';

        if(preg_match($pattern, $video->url, $matches)){
            $id = $matches[1];

            $video->image="https://img.youtube.com/vi/$id/mqdefault.jpg";
        }
    }
}
