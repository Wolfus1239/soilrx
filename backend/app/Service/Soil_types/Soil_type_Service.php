<?php

namespace App\Service\Soil_types;

use App\Models\Soil_type;

class Soil_type_Service
{
    public function SoilTypes()
    {
        $soil = Soil_type::all();
        return $soil;
    }

}
