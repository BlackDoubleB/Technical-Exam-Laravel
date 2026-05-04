<?php

namespace App\Services;
use App\Models\Persona;
class PeopleService
{
     public function getAll()
    {
        return Persona::with('area')->get();
    }

    public function getById(Persona $person)
    {
        return $person->load('area');
    }

    public function create(array $data)
    {
        return Persona::create($data);
    }

    public function update(Persona $person, array $data)
    {
        $person->update($data);
        return $person;
    }

    public function delete(Persona $person)
    {
        $person->delete();
        return true;
    }
}
