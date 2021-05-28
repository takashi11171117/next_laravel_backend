<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherIndexResource;
use App\Repositories\Contracts\TeacherRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeacherController extends Controller
{
    protected $videos;

    public function __construct(TeacherRepository $teachers)
    {
        $this->teachers = $teachers;
    }

    public function index() : AnonymousResourceCollection
    {
        $teachers = $this->teachers->paginate(20);

        return TeacherIndexResource::collection($teachers);
    }
}
