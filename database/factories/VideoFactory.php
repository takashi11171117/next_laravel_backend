<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => Teacher::factory()->createOne()->id,
            'title'   => $this->faker->realText(100),
            'vimeo_video_id' => Str::random(10),
            'thumbnail_path' => 'https://images.unsplash.com/photo-1607112812619-182cb1c7bb61?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80',
        ];
    }
}
