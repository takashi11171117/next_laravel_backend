<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnail_path' => $this->thumbnail_path,
            'vimeo_video_id' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return $result;
    }
}
