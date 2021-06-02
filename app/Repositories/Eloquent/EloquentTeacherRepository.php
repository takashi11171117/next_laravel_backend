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

    public function findWhereFirst(string $column, string $value)
    {
        $model = $this->entity
            ->where($column, $value)->first();

        if (!$model) {
            throw (new ModelNotFoundException())->setModel(
                get_class($this->entity->getModel())
            );
        }

        return $model;
    }
}
