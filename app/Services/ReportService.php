<?php
// app/Services/ReportService.php

namespace App\Services;

use App\Models\Asistencia;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;

class ReportService
{

    public function reportByArea($from, $to, $areaName = null)
    {
        $query = Asistencia::select(
            'areas.name as area',
            DB::raw("SUM(attendances.status = 'Presente') as presente"),
            DB::raw("SUM(attendances.status = 'Falta') as falta"),
            DB::raw("SUM(attendances.status = 'Tardanza') as tardanza"),
            DB::raw("SUM(attendances.status = 'Permiso') as permiso")
        )
            ->join('people', 'attendances.person_id', '=', 'people.id')
            ->join('areas', 'people.area_id', '=', 'areas.id')
            ->whereBetween('attendances.date', [$from, $to]);

        if ($areaName) {
            $query->whereRaw('LOWER(TRIM(areas.name)) = ?', [
                strtolower(trim($areaName))
            ]);
        }

        return $query->groupBy('areas.name')->get();
    }

    public function reportByPerson($personId, $from, $to)
    {
        $persona = Persona::find($personId);

        if (!$persona) {
            throw new \Exception('La persona no existe');
        }

        $data = Asistencia::with('persona')
            ->where('person_id', $personId)
            ->whereBetween('date', [$from, $to])
            ->get();

        if ($data->isEmpty()) {
            throw new \Exception('No hay asistencias en ese rango de fechas');
        }

        return $data;
    }
}
