<?php

namespace App\Providers;

use App\Repository\DoctoerRepositoryInterface;
use App\Repository\NuerseRepositoryInterface;
use App\Repository\PharmieseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repository\PharmieseRepositoryInterface',
            'App\Repository\PharmieseRepository');

        $this->app->bind(
            'App\Repository\DoctoerRepositoryInterface',
            'App\Repository\DoctorRepository');

        $this->app->bind(
            'App\Repository\NuerseRepositoryInterface',
            'App\Repository\NuerseRepository');

        $this->app->bind(
            'App\Repository\ClinceRepositoryInterface',
            'App\Repository\ClinceRepository');

        $this->app->bind(
            'App\Repository\UserRepositoryInterface',
            'App\Repository\UserRepository');

        $this->app->bind(
            'App\Repository\WatingRepositoryInterface',
            'App\Repository\WatingRepository');

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
