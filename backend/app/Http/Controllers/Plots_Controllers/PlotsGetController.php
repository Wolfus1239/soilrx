<?php

namespace App\Http\Controllers\Plots_Controllers;

use App\Http\Controllers\Controller;
use App\Service\Plot\PlotService;

class PlotsGetController extends Controller
{
    public function getPlots($id)
    {
        if (!\App\Models\Plot::find($id)) {
            abort(404);
        }

        $plots = (new PlotService)->getPlots($id);

        return response()->json($plots, 200);
    }

    public function getPlotsAll()
    {
        $plots = (new PlotService)->getPlotsAll();
        return response()->json($plots, 200);

    }
}
