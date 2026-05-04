<?php

namespace App\Services;
namespace App\Services;

use App\Models\Asistencia;
use App\Models\Attendance;

class AttendanceService
{
    public function getAll()
    {
        return Asistencia::with('persona')->get();
    }

    public function getById(Asistencia $attendance)
    {
        return $attendance->load('persona');
    }

    public function create(array $data)
    {
        return Asistencia::create($data);
    }

    public function update(Asistencia $attendance, array $data)
    {
        $attendance->update($data);
        return $attendance;
    }

    public function delete(Asistencia $attendance)
    {
        $attendance->delete();
        return true;
    }
}
