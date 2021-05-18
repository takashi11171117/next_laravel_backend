<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    public function toArray(Request $request) : array
    {
        $result = [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnail_path' => $this->thumbnail_path,
            'vimeo_video_id' => $this->content,
        ];

        return $result;
    }
}
