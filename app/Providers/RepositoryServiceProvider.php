<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    VideoRepository
};

use App\Repositories\Eloquent\{
    EloquentVideoRepository
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
