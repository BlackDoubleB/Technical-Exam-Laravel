<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeopleRequest;
use App\Models\Persona;
use App\Services\PeopleService;
use App\Http\Requests\UpdatePeopleRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PeopleController extends Controller
{
    use AuthorizesRequests;

    public function index(PeopleService $service)
    {
        $this->authorize('viewAny', Persona::class);

        return response()->json($service->getAll());
    }

    public function show(int $id, PeopleService $service)
    {
        $persona = Persona::findOrFail($id);

        $this->authorize('view', $persona);

        return response()->json($service->getById($persona));
    }

    public function store(CreatePeopleRequest $request, PeopleService $service)
    {
        $this->authorize('create', Persona::class);

        $persona = $service->create($request->validated());

        return response()->json([
            'message' => 'Persona creada correctamente',
            'data' => $persona
        ], 201);
    }

    public function update($id, UpdatePeopleRequest $request, PeopleService $service)
    {
        $persona = Persona::findOrFail($id);
        $this->authorize('update', $persona);
        
        $persona = $service->update($persona, $request->validated());
        return response()->json(['message' => 'Persona actualizada correctamente', 'data' => $persona]);
    }

    public function destroy(Persona $persona, PeopleService $service)
    {
        $this->authorize('delete', $persona);

        $service->delete($persona);

        return response()->json([
            'message' => 'Persona eliminada correctamente'
        ]);
    }
}
