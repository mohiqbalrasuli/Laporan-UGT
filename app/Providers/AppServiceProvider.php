<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        // View::composer('*', function ($view) {
        //     if (Auth::check()) {
        //         $user = Auth::user();
        //         $view->with('notifikasi', $user->unreadNotifications);
        //     }
        //     $view->with('notifikasi', $user->unreadNotifications->take(5));
        // });
    }
}
