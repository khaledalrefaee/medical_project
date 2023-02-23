<?php

namespace App\Providers;

use App\Repository\DoctoerRepositoryInterface;
use App\Repository\PharmieseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\PharmieseRepositoryInterface',
            'App\Repository\PharmieseRepository');

        $this->app->bind(
            'App\Repository\DoctoerRepositoryInterface',
            'App\Repository\DoctorRepository');


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
