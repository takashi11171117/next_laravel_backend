<?php

namespace App\Repositories\Eloquent;

use App\Models\Teacher;
use App\Repositories\Contracts\TeacherRepository;
use App\Repositories\RepositoryAbstract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentTeacherRepository extends RepositoryAbstract implements TeacherRepository
{
    public function entity()
    {
        return Teacher::class;
    }
}
