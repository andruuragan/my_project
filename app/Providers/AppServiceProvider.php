<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::defaultView('vendor.pagination.bootstrap-4');

        // Отключаем проверку SSL для всех HTTP-клиентов на локальном сервере
        if (config('app.env') === 'local') {
            Http::globalOptions([
                'verify' => false,
            ]);
        }
    }

}
