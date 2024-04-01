<?php

namespace App\Providers;

use App\Models\Form;
use App\Observers\FreezEmail;
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
        Form::observe(FreezEmail::class);
    }
}
