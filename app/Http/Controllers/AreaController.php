<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Services\AreaService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AreaController extends Controller
{
    use AuthorizesRequests;

    function index(AreaService $areaService)
    {
        $this->authorize('viewAny', Area::class);
        $areas = $areaService->viewAllArea();
        return response()->json($areas);
    }

    public function store(CreateAreaRequest $request, AreaService $areaService)
    {

        $this->authorize('create', Area::class);

        $data = $request->validated();
        $area = $areaService->createArea($data);

        return response()->json([
            'message' => 'Área creada correctamente',
            'data' => $area
        ], 201);
    }

    public function show(int $id, AreaService $areaService)
    {
        $area = $areaService->viewIdArea($id);
        $this->authorize('view', $area);

        return response()->json($area);
    }

    public function update(UpdateAreaRequest $request, Area $area, AreaService $areaService)
    {
        $this->authorize('update', $area);

        $data = $request->validated();

        $area = $areaService->updateArea($area, $data);

        return response()->json([
            'message' => 'Área actualizada correctamente',
            'data' => $area
        ]);
    }

    public function destroy(Area $area, AreaService $areaService)
    {

        $this->authorize('delete', $area);

        try {
            $areaService->deleteArea($area);

            return response()->json([
                'message' => 'Área eliminada correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
