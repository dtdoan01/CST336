<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\Route;
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
        $models = ['game', 'platform', 'genre'];

        // Allow looking up the above models by slug or ID
        foreach ($models as $name) {
            Route::bind($name, function ($value) use ($name) {
                $class = 'App\\'.ucfirst($name);
                $model = is_numeric($value) ?
                    $class::find($value) : $class::where('slug', $value)->first();

                abort_unless($model, 404);

                return $model;
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
