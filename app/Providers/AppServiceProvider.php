<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletters\Contracts\Newsletter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        app()->bind(Newsletter::class, fn () => newsletterInstance());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', fn (User $user) =>  $user->is_admin);

        Blade::if('admin', fn () => Auth::user()?->can('admin'));
    }
}
