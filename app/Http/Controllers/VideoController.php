<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoIndexResource;
use App\Http\Resources\VideoResource;
use App\Repositories\Contracts\VideoRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

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
}
