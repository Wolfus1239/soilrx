<?php

namespace App\Http\Controllers\Plots_Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlotRequest\PlotAddRequest\StoreRequest;
use App\Service\Pdf\PdfService;
use App\Service\Plot\PlotService;
use Illuminate\Http\Request;

class PlotsAddController extends Controller
{

   public function PlotAdd(StoreRequest $request)

    {


       $data= $request->validated();

        if (!$request['pdf'])
            {
                $plot = (new PlotService)->addPlots($data);
                return response()->json($plot, 200);
            }

        else
            {
                $pdf = (new PdfService)->PdfParsing($request);

                return response()->json($pdf, 200);
            }
    }

    public function uploadPdf($id,Request $request)
    {

        if (!$request['pdf'])
        {
            return response()->json(['message' => 'No pdf file'], 400);
        }

        $pdf = (new PdfService)->uploadPdf($id, $request);
        return response()->json($pdf, 200);
    }

}
