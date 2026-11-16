<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- Tambahkan Facade Gate
use App\Models\User;               // <-- Tambahkan Model User
use Illuminate\Support\Facades\URL;

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
        if (config('app.env') === 'production')
        Gate::define('kelola-buku', function (User $user) {
            return $user->hasRole(['admin', 'petugas']);
        });
    }
}