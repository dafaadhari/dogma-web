<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Paginator::useTailwind();

        if (env('APP_URL')) {
            URL::forceRootUrl(env('APP_URL'));
        }

        if (str_contains(env('APP_URL'), 'https://')) {
            URL::forceScheme('https');
        }
    }
}