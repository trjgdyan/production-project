<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

    public static $permissions = [
        'all' => [
            '1'
        ],
        'sdm' => [
            '1',
            '2',
        ],
        'produksiReject' => [
            '1',
            '3',
        ],
    ];

    public function boot(): void
    {
        foreach (self::$permissions as $key => $value) {
            Gate::define($key, function ($user) use ($value) {
                if (in_array($user->class, $value)) {
                    return true;
                }
            });
        }
    }
}
