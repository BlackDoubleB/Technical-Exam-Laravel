<?php

namespace App\Policies;

use App\Models\People;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PeoplePolicy
{
  public function viewAny(User $user): bool
    {
        return in_array($user->role->name, ['Administrador', 'Supervisor']);
    }

    public function view(User $user, Person $person): bool
    {
        return in_array($user->role->name, ['Administrador', 'Supervisor']);
    }

    public function create(User $user): bool
    {
        return $user->role->name === 'Administrador';
    }

    public function update(User $user, Person $person): bool
    {
        return $user->role->name === 'Administrador';
    }

    public function delete(User $user, Person $person): bool
    {
        return $user->role->name === 'Administrador';
    }
}
