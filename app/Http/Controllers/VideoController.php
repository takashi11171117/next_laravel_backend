<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Resources\VideoIndexResource;
use App\Http\Resources\VideoResource;
use App\Repositories\Contracts\VideoRepository;
use App\Repositories\Eloquent\EloquentVideoRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;


class VideoController extends Controller
{
    protected $videos;

    public function __construct(VideoRepository $videos)
    {
        $this->videos = $videos;
    }

    public function index() : AnonymousResourceCollection
    {
        $videos = $this->videos->paginate(20);

        return VideoIndexResource::collection($videos);
    }

    public function findListByTeacher(string $name) : AnonymousResourceCollection
    {
        $videos = $this->videos->paginateByTeacher($name);

        return VideoIndexResource::collection($videos);
    }

    public function show(int $id) : VideoResource
    {
        $video = $this->videos->findWithRelations($id);

        return new VideoResource($video);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(VideoRequest $request) 
    {

        $video = $this->videos->post($request);
        return new VideoResource($video);

    }
}
