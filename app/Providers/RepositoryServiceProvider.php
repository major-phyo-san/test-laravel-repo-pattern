<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Repositories\Car\CarRepository;
use App\Http\Repositories\Car\CarRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){

    }
}
