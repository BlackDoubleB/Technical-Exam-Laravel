<?php

namespace App\Providers;

use App\Http\Controllers\AttendanceController;
use App\Models\Area;
use App\Models\Asistencia;
use App\Models\Persona;
use App\Policies\AreaPolicy;
use App\Policies\PeoplePolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $policies = [
        Area::class => AreaPolicy::class,
        Asistencia::class => AttendanceController::class,
        Persona::class => PeoplePolicy::class,
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
