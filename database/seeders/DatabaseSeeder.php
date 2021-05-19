<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'develop_user',
            'email' => 'takashi11171117@gmail.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Teacher::create([
            'name' => 'develop_teacher',
            'email' => 'takashi11171117@gmail.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
        $this->call(VideoTableSeeder::class);
    }
}
