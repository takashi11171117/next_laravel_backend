<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    VideoRepository,
    TeacherRepository
};

use App\Repositories\Eloquent\{
    EloquentVideoRepository,
    EloquentTeacherRepository
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(VideoRepository::class, EloquentVideoRepository::class);
        $this->app->bind(TeacherRepository::class, EloquentTeacherRepository::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
