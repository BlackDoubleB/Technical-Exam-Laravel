<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
  
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Gate::policy(\App\Models\Asistencia::class, \App\Policies\AttendancePolicy::class);
         Gate::policy(\App\Models\Area::class, \App\Policies\AreaPolicy::class);
         Gate::policy(\App\Models\Persona::class, \App\Policies\PeoplePolicy::class);
    }
}
