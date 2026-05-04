<?php

namespace App\Services;

use App\Models\Area;

class AreaService
{

    function viewAllArea()
    {
        return Area::all();
    }

    function viewIdArea(int $id)
    {
        return Area::findOrFail($id);
    }

    public function createArea(array $data)
    {
        return Area::create($data);
    }

    public function updateArea(Area $area, array $data)
    {
        $area->update($data);

        return $area;
    }

    public function deleteArea(Area $area)
    {
        if ($area->people()->exists()) {
            throw new \Exception('No se puede eliminar el área porque tiene personas asociadas');
        }

        $area->delete();

        return true;
    }
}
