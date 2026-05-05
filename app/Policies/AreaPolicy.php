<?php

namespace App\Policies;

use App\Models\Area;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AreaPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->name, [
            'Administrador'
        ]);
    }

    public function view(User $user, Area $area): bool
    {
        return in_array($user->role->name, [
            'Administrador'
        ]);
    }

    public function create(User $user): bool
    {
        return $user->role->name === 'Administrador';
    }

    public function update(User $user, Area $area): bool
    {
        return $user->role->name === 'Administrador';
    }

    public function delete(User $user, Area $area): bool
    {
        return $user->role->name === 'Administrador';
    }
}
