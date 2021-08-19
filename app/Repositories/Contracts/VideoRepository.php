<?php

namespace App\Repositories\Contracts;

interface VideoRepository
{
    //
    public function paginate();

    public function paginateByTeacher(string $teacher_name);

    public function findWithRelations(int $id);

    public function post($request);
}
