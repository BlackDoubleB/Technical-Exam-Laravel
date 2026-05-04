<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Asistencia;
use App\Services\AttendanceService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttendanceController extends Controller
{
    use AuthorizesRequests;
    
    public function index(AttendanceService $service)
    {
        $this->authorize('viewAny', Asistencia::class);

        return response()->json($service->getAll());
    }

    public function show(Asistencia $attendance, AttendanceService $service)
    {
        $this->authorize('view', $attendance);

        return response()->json($service->getById($attendance));
    }

    public function store(CreateAttendanceRequest $request, AttendanceService $service)
    {
        $this->authorize('create', Asistencia::class);

        $attendance = $service->create($request->validated());

        return response()->json([
            'message' => 'Asistencia registrada',
            'data' => $attendance
        ], 201);
    }

    public function update(UpdateAttendanceRequest $request, Asistencia $attendance, AttendanceService $service)
    {
        $this->authorize('update', $attendance);

        $attendance = $service->update($attendance, $request->validated());

        return response()->json([
            'message' => 'Asistencia actualizada',
            'data' => $attendance
        ]);
    }

    public function destroy(Asistencia $attendance, AttendanceService $service)
    {
        $this->authorize('delete', $attendance);

        $service->delete($attendance);

        return response()->json([
            'message' => 'Asistencia eliminada'
        ]);
    }
}
