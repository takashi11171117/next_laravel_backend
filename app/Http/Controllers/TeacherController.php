<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherIndexResource;
use App\Http\Resources\TeacherResource;
use App\Repositories\Contracts\TeacherRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeacherController extends Controller
{
    protected $teachers;

    public function __construct(TeacherRepository $teachers)
    {
        $this->teachers = $teachers;
    }

    public function index() : AnonymousResourceCollection
    {
        $teachers = $this->teachers->paginate(20);

        return TeacherIndexResource::collection($teachers);
    }

    public function show(string $name)
    {
        return new TeacherResource(
            $this->teachers->findWhereFirst('name', $name)
        );
    }
}
