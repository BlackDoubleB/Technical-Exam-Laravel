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

        if ($user->role->name === 'Colaborador') {
            abort(403, 'No autorizado');
        }

        if ($user->role->name === 'Supervisor' && !$request->area) {
            abort(400, 'Debe enviar el nombre del área');
        }

        return response()->json(
            $service->reportByArea(
                $request->from,
                $request->to,
                $request->area
            )
        );
    }

    public function byPerson(Request $request, ReportService $service)
    {
        $user = Auth::user();

        if ($user->role->name === 'Colaborador') {
            if (!$request->person_id) {
                abort(400, 'Debe enviar su person_id');
            }
        }

        return response()->json(
            $service->reportByPerson(
                $request->person_id,
                $request->from,
                $request->to
            )
        );
    }
}
