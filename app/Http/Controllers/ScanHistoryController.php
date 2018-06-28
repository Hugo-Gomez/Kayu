<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ScanHistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application history.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = DB::table('history')->get(['barcode']);
        $additives = DB::table('additives')->get();

        $i = 1;
        $o = 1;

        foreach ($history as $h) {
            $json = json_decode(file_get_contents('https://world-fr.openfoodfacts.org/api/v0/produit/' . $h->barcode . '.json'), true);
            $inputs[$i]["name"] = $json["product"]["product_name_fr"];
            $inputs[$i]["barcode"] = $json["product"]["code"];
            $inputs[$i]["nutriments"] = $json["product"]["nutriments"];
            $inputs[$i]["additives_tags"] = $json["product"]["additives_tags"];
            $inputs[$i]["ingredients_tags"] = $json["product"]["ingredients_tags"];
            $inputs[$i]["nutrient_levels"] = $json["product"]["nutrient_levels"];
            $inputs[$i]["image"] = $json["product"]["image_small_url"];

            $i++;
        }

        $o--;
        $i--;

        return view('history', compact('inputs','i','additives'));
    }
}
