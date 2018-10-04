<?php

namespace App\Providers;

use App\CognitiveTranslator;
use App\Translates;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Translates::class, function ($app) {
            return new CognitiveTranslator(env('MS_COGNITIVE_KEY'));
        });
    }
}
