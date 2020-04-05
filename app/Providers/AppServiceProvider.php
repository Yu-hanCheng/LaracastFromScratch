<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Example;
use App\Collaborator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('example', function(){
            return new Example();
});
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
