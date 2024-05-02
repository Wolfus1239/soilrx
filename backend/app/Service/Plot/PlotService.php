<?php

namespace App\Service\Plot;

use App\Models\Chemical_analysis_resault;
use App\Models\Plot;

class PlotService
{
    public function AddPlots($request)
    {
        $plot = new Plot();
        $plot->name = $request['name'];
        $plot->size = $request['size'];
        $plot->field_id = $request['field_id'];
        $plot->soil_type_id = $request['soil_type_id'];
        $plot->culture_id = $request['culture_id'];
        $plot->save();
        return $plot;
        }

    public function deletePlots($id)
    {
        $plot = Plot::find($id);
        $plot->delete();
        return $plot;
    }

    public function editPlots($id,$data)
    {
        $plot = Plot::find($id);
        $plot->name = $data['name'];
        $plot->size = $data['size'];
        $plot->save();
        return $plot;
    }

    public function getPlots($id)
    {
        $plot = Plot::find($id);
        return $plot;
    }

    public function getPlotsAll()
    {
        $plots = Plot::all();
        return $plots;
    }
}
