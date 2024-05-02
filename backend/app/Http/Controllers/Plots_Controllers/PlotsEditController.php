<?php

namespace app\Http\Controllers\Plots_Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlotRequest\PlotEditRequest\StoreRequest;
use App\Service\Plot\PlotService;

class PlotsEditController extends Controller
{

    public function editPlots($id, StoreRequest $request)
    {
        if (!\App\Models\Plot::find($id)) {
            abort(404);
        }

        $data=$request->validated();
        $status = (new PlotService)->editPlots($id,$data);

        return response()->json($status, 200);
    }
}
