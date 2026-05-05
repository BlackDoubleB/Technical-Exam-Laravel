<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function byArea(Request $request, ReportService $service)
    {
        $user = Auth::user();

        $from = $request->query('from');
        $to = $request->query('to');
        $area = $request->query('area');


        if ($user->role->name === 'Administrador') {
            return response()->json(
                $service->reportByArea($from, $to, $area)
            );
        }


        if ($user->role->name === 'Supervisor') {
            if (!$area) {
                return response()->json([
                    'message' => 'Debe enviar el parámetro area'
                ], 400);
            }

            return response()->json(
                $service->reportByArea($from, $to, $area)
            );
        }

        return response()->json([
            'message' => 'No autorizado'
        ], 403);
    }

    public function byPerson(Request $request, ReportService $service)
    {
        $user =  Auth::user();

        $from = $request->query('from');
        $to = $request->query('to');
        $personId = $request->query('person_id');

        if ($user->role->name === 'Administrador') {

            if (!$personId) {
                return response()->json([
                    'message' => 'Debe enviar person_id'
                ], 400);
            }

            try {
                $data = $service->reportByPerson($personId, $from, $to);

                return response()->json($data);
            } catch (\Exception $e) {

                return response()->json([
                    'message' => $e->getMessage()
                ], 404);
            }
        }

        return response()->json([
            'message' => 'No autorizado'
        ], 403);
    }
}
