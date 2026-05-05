<?php
// app/Services/ReportService.php

namespace App\Services;

use App\Models\Asistencia;
use Illuminate\Support\Facades\DB;

class ReportService
{

    public function reportByArea($from, $to, $areaName = null)
    {
        $query = Asistencia::select(
                'areas.name as area',
                DB::raw("SUM(status = 'Presente') as presente"),
                DB::raw("SUM(status = 'Falta') as falta"),
                DB::raw("SUM(status = 'Tardanza') as tardanza"),
                DB::raw("SUM(status = 'Permiso') as permiso")
            )
            ->join('people', 'attendances.person_id', '=', 'people.id')
            ->join('areas', 'people.area_id', '=', 'areas.id')
            ->whereBetween('date', [$from, $to]);

        if ($areaName) {
            $query->where('areas.name', $areaName);
        }

        return $query->groupBy('areas.name')->get();
    }

    public function reportByPerson($personId, $from, $to)
    {
        $query = Asistencia::with('persona')
            ->whereBetween('date', [$from, $to]);

        if ($personId) {
            $query->where('person_id', $personId);
        }

        return $query->orderBy('date')->get();
    }
}