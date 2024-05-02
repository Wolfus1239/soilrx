<?php

namespace app\Http\Controllers\Plots_Controllers;

use App\Http\Controllers\Controller;
use App\Service\Plot\PlotService;

class PlotsDeleteController extends Controller
{
    public function deletePlots($id)
    {
        if (!\App\Models\Plot::find($id)) {
            abort(404);
        }

        $status = (new PlotService)->deletePlots($id);

        return response()->json($status, 200);

    }
}
