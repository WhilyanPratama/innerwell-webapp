<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Model::preventLazyLoading(!app()->isProduction());
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::aliasMiddleware('role', \App\Http\Middleware\CheckRole::class);
    }
}
