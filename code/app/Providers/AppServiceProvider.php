<?php

namespace App\Providers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        Route::bind('task', function (string $id) {
            return Task::whereId($id)->where("period_end", ">", today())->firstOrFail();
        });
    }
}