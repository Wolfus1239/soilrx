<?php

namespace App\Http\Controllers\Soil_type_Controllers;
use App\Http\Controllers\Controller;
use App\Service\Soil_types\Soil_type_Service;

class SoilTypeController extends Controller
{

    public function listing_type_soil()
    {
    $soil=(new Soil_type_Service())->SoilTypes();
    return response()->json($soil, 200);
    }
}
