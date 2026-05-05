<?php

namespace App\Policies;

use App\Models\Persona;
use App\Models\User;

class PeoplePolicy
{
  public function viewAny(User $user): bool
    {
        return in_array($user->role->name, ['Administrador', 'Supervisor']);
    }

    public function view(User $user, Persona $person): bool
    {
        return in_array($user->role->name, ['Administrador', 'Supervisor']);
    }

    public function create(User $user): bool
    {
        return $user->role->name === 'Administrador';
    }

    public function update(User $user, Persona $person): bool
    {
        return $user->role->name === 'Administrador';
    }

    public function delete(User $user, Persona $person): bool
    {
        return $user->role->name === 'Administrador';
    }
}
