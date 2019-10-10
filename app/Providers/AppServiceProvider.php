<?php

namespace App\Providers;

use App\Repository\IEventsRepo;
use App\Repository\EloquentEventRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            IEventsRepo::class, 
            function() {
                return new EloquentEventRepo();
            }
        );

        $this->app->bind(
            EventsController::class, 
            function($app) {
                return new EventController(
                    $app[IEventsRepo::class]
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
