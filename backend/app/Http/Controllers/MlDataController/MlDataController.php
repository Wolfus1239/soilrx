<?php

namespace App\Http\Controllers\MlDataController;
use App\Http\Controllers\Controller;
use App\Components\ImportDataMl;
use GuzzleHttp;
use App\Models\Chemical_analysis_resault;


class MlDataController extends Controller
{

    public function predictFertile($id)
    {
        $client=new ImportDataMl();

        $analis = Chemical_analysis_resault::all()->where('plots_id', $id);
        foreach ($analis as $analys){
            $data_analis['N'] = $analys->nitric_oxide;
            $data_analis['P'] = $analys->phosphorus_oxide;
            $data_analis['K'] = $analys->potassium_oxide;
            $data_analis['ph'] = $analys->pH;
        }

        $data_analis=['N'=>floatval($data_analis['N']),'P'=>floatval($data_analis['P']),'K'=>floatval($data_analis['K']),'ph'=>floatval($data_analis['ph'])];

        $request=$client->client->request('POST', 'predict_fertile', [
            GuzzleHttp\RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            GuzzleHttp\RequestOptions::JSON => ['features'=>$data_analis]]);

        $data=$request->getBody()->getContents();

        $m=json_decode($data, true);
        $l=$m['fertile_prediction'];
        $date = (date_add(date_create(), date_interval_create_from_date_string('0 day')));


        if ($l=='Less Fertile'){
            return response()->json(['Почва'=>'не плодородная','Дата'=>$date],200,['Content-Type'=>'application/json'],JSON_UNESCAPED_UNICODE);
        }
        if ($l=='Fertile'){
            return response()->json(['Почва'=>'менее плодородная','Дата'=>$date],200,['Content-Type'=>'application/json'],JSON_UNESCAPED_UNICODE);
        }
        if ($l=='High Fertile'){
            return response()->json(['Почва'=>'очень плодородная','Дата'=>$date],200,['Content-Type'=>'application/json'],JSON_UNESCAPED_UNICODE);
        }
    }

    public function analysisFertile($id)
    {
        $client=new ImportDataMl();

        $analis = Chemical_analysis_resault::all()->where('plots_id', $id);
        foreach ($analis as $analys){
            $data_analis['N'] = $analys->nitric_oxide;
            $data_analis['P'] = $analys->phosphorus_oxide;
            $data_analis['K'] = $analys->potassium_oxide;
        }

        $data_analis=['N'=>floatval($data_analis['N']),'P'=>floatval($data_analis['P']),'K'=>floatval($data_analis['K'])];

        $request=$client->client->request('POST', 'analysis', [
            GuzzleHttp\RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            GuzzleHttp\RequestOptions::JSON => ['features'=>$data_analis]]);

            $data[]=$request->getBody()->getContents();
            $data[] = (date_add(date_create(), date_interval_create_from_date_string('0 day')));


            return response()->json($data,200,['Content-Type'=>'application/json'],JSON_UNESCAPED_UNICODE);

}
public function topRecommend($id)
{
    $client=new ImportDataMl();

    $analis = Chemical_analysis_resault::all()->where('plots_id', $id);
    foreach ($analis as $analys){
        $data_analis['N'] = $analys->nitric_oxide;
        $data_analis['P'] = $analys->phosphorus_oxide;
        $data_analis['K'] = $analys->potassium_oxide;
        $data_analis['ph'] = $analys->pH;
    }

    $data_analis=['N'=>floatval($data_analis['N']),'P'=>floatval($data_analis['P']),'K'=>floatval($data_analis['K']),'ph'=>floatval($data_analis['ph'])];

    $request=$client->client->request('POST', 'top_recommendation', [
        GuzzleHttp\RequestOptions::HEADERS => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        GuzzleHttp\RequestOptions::JSON => ['features'=>$data_analis]]);

    $data=$request->getBody()->getContents();

    $m=json_decode($data, true);
    $l=$m['top_recommendations'];

    foreach ($l as $l) {
        if ($l=='Jambun(Syzygium cumini)'){
            $recommendArr[] = 'Огурчик';
        }
        if ($l=='Ziziphus mauritiana(Bor)'){
            $recommendArr[] = 'Кукуруза';
        }
        if ($l=='Coriander leaves'){
            $recommendArr[] = 'Капуста';
        }
        if ($l=='Horse Gram(kulthi)'){
            $recommendArr[] = 'Помидор';
        }
        if ($l=='Bitter Gourd'){
            $recommendArr[] = 'Морковь';
        }
        if ($l=='Drumstick – moringa'){
            $recommendArr[] = 'Баклажан';
        }
        if ($l=='Curry leaves'){
            $recommendArr[] = 'Свекла';
        }
    }
    $recommendArr[] = (date_add(date_create(), date_interval_create_from_date_string('0 day')));
    return response()->json($recommendArr, 200,['Content-Type'=>'application/json'],JSON_UNESCAPED_UNICODE);

}


}
