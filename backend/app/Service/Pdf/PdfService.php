<?php

namespace App\Service\Pdf;

use App\Models\Chemical_analysis_resault;
use App\Models\Plot;

class PdfService
{
    public function PdfParsing($request)
    {
        $plot = new Plot();
        $plot->name = $request['name'];
        $plot->size = $request['size'];
        $plot->field_id = $request['field_id'];
        $plot->soil_type_id = $request['soil_type_id'];
        $plot->culture_id = $request['culture_id'];
        $plot->save();

        $pdf=$request->file('pdf');
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($pdf);
        $text = $pdf->getText();


        $azot= substr($text, '4553','4');
        $fosvor= substr($text, '5341','4');
        $kaliy= substr($text, '5346','4');
        $ph= substr($text, '2359','3');

        $arr = array('N' => $azot, 'P' => $fosvor, 'K' => $kaliy, 'pH' => $ph);


        $analiz = new Chemical_analysis_resault();
        $analiz->potassium_oxide = $azot;
        $analiz->nitric_oxide = $fosvor;
        $analiz->phosphorus_oxide = $kaliy;
        $analiz->pH = $ph;
        $analiz->pdf_path = $request->file('pdf')->store('public/pdf');
        $analiz->plots_id = $plot->id;
        $analiz->save();

        return $arr;
    }

    public function uploadPdf($id, $request)
    {

        $pdf=$request->file('pdf');
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($pdf);
        $text = $pdf->getText();


        $azot= substr($text, '4553','4');
        $fosvor= substr($text, '5341','4');
        $kaliy= substr($text, '5346','4');
        $ph= substr($text, '2359','3');

        $arr = array('N' => $azot, 'P' => $fosvor, 'K' => $kaliy, 'pH' => $ph);


        $analiz = new Chemical_analysis_resault();
        $analiz->potassium_oxide = $azot;
        $analiz->nitric_oxide = $fosvor;
        $analiz->phosphorus_oxide = $kaliy;
        $analiz->pH = $ph;
        $analiz->pdf_path = $request->file('pdf')->store('public/pdf');
        $analiz->plots_id = $id;
        $analiz->save();

        return $arr;
    }
}
