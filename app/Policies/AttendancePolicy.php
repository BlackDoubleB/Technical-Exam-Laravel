<?php

namespace App\Policies;

use App\Models\Asistencia;
use App\Models\User;

class AttendancePolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }

    public function view(User $user, Asistencia $attendance): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }

    public function create(User $user): bool
    {
        return true; 
    }

    public function update(User $user, Asistencia $attendance): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }

    public function delete(User $user, Asistencia $attendance): bool
    {
        return in_array($user->role->name, [
            'Administrador',
            'Supervisor'
        ]);
    }
}
