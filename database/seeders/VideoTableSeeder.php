<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = Teacher::create([
            'name' => 'develop_teacher',
            'email' => 'takashi11171117@gmail.com',
            'image' => 'https://images.unsplash.com/photo-1541855492-581f618f69a0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Video::factory(20)->create(['teacher_id' => $teacher->id]);
        Teacher::factory(20)->create()->each(function(Teacher $teacher) {
            Video::factory(20)->create([
                'teacher_id' => $teacher->id,
            ]);
        });
    }
}
