<?php

namespace App\Policies;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AttendancePolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }

    public function view(User $user, Attendance $attendance): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }

    public function create(User $user): bool
    {
        return true; // todos pueden marcar asistencia
    }

    public function update(User $user, Attendance $attendance): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }

    public function delete(User $user, Attendance $attendance): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }
}
