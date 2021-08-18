<?php

namespace App\Repositories\Eloquent;

use App\Models\Video;
use App\Repositories\Contracts\VideoRepository;
use App\Repositories\RepositoryAbstract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentVideoRepository extends RepositoryAbstract implements VideoRepository
{
    public function entity()
    {
        return Video::class;
    }

    public function paginateByTeacher(string $teacher_name)
    {
        return $this->entity
            ->with(['teacher'])
            ->whereHas('teacher', function ($query) use ($teacher_name) {
                $query->where('name', $teacher_name);
            })
            ->paginate(20);
    }

    public function findWithRelations(int $id)
    {
        $model = $this->entity->with(['teacher'])
                              ->find($id);

        if (!$model) {
            throw (new ModelNotFoundException())->setModel(
                get_class($this->entity->getModel()), $id
            );
        }

        return $model;
    }

    public function post($properties)
    {
        $model = $this->entity;
        $form = $properties->all();
        $model->fill($form)->save();
        return $model;
    }
}
