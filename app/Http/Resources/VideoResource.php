<?php

namespace App\Http\Resources;

use App\Http\Resources\TeacherResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
        ];

        $result['teacher'] = new TeacherResource($this->teacher);

        return $result;
    }
}
