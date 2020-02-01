<?php

namespace App\Providers;

use App\Domain\Core\Extenders\BladeExtender;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
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
        $app = $this->app;
        if ($app->environment() !== 'production')
            $app->register(IdeHelperServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BladeExtender::extend();
    }
}
