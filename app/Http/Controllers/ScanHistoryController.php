<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        $user = Auth::user();
        $history = DB::table('history')->where('user_id','=',$user->id)->orderBy('created_at', 'ASC')->get(['barcode']);
        $additives = DB::table('additives')->get();
        $user = Auth::user();

        $i = 1;

        foreach ($history as $h) {
            $json = json_decode(file_get_contents('https://world-fr.openfoodfacts.org/api/v0/produit/' . $h->barcode . '.json'), true);
            //dd($json);
            $inputs[$i]["name"] = $json["product"]["product_name_fr"];
            $inputs[$i]["barcode"] = $json["product"]["code"];
            $inputs[$i]["energy_value"] = $json["product"]["nutriments"]["energy_value"];
            $inputs[$i]["energy_unit"] = $json["product"]["nutriments"]["energy_unit"];
            $inputs[$i]["additives_tags"] = $json["product"]["additives_tags"];
            $inputs[$i]["ingredients_tags"] = $json["product"]["ingredients_tags"];
            if ($json["product"]["nutrient_levels"] != null)
            {
              $inputs[$i]["nutrient_levels"] = $json["product"]["nutrient_levels"];
              $inputs[$i]["sugar"]=self::nutrimentLevelSugar($user, $json);
              $inputs[$i]["salt"]=self::nutrimentLevelSalt($user, $json);
              $inputs[$i]["fat"]=self::nutrimentLevelFat($user, $json);
              $inputs[$i]["saturedFat"]=self::nutrimentLevelSaturedFat($user, $json);
            }
            else $inputs[$i]["nutrient_levels"] = 0;

            $inputs[$i]["image"] = $json["product"]["image_small_url"];

            if ($json["product"]["image_ingredients_url"] != null)
            {
                $inputs[$i]["ingredients_image"] = $json["product"]["image_ingredients_url"];
            }

            $i++;
        }

        $i--;

        return view('history', compact('inputs','i','additives'));
    }


    // Fonction pour le sucre
    public function nutrimentLevelSugar ($user, $json) {
      if ($user->sugar == 'low')
      {
        if ($json["product"]["nutrient_levels"]["sugars"] == 'low')
        {
          $sugar["text"] = "Faible, validé par rapport à vos préférences";
          $sugar["color"] = "#66ff99";
          return $sugar;
        }
        elseif ($json["product"]["nutrient_levels"]["sugars"] == 'medium')
        {
          $sugar["text"] = "Moyen, ne correspond pas à vos préférences";
          $sugar["color"] = "#d42f2f";
          return $sugar;
        }
        else
        {
          $sugar["text"] = "Elevé, ne correspond à vos préférences";
          $sugar["color"] = "#d42f2f";
          return $sugar;
        }
      }
      if ($user->sugar == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["sugars"] == 'low')
        {
          $sugar["text"] = "Faible, validé par rapport à vos préférences";
          $sugar["color"] = "#66ff99";
          return $sugar;
        }
        elseif ($json["product"]["nutrient_levels"]["sugars"] == 'medium')
        {
          $sugar["text"] = "Moyen, validé par rapport à vos préférences";
          $sugar["color"] = "#66ff99";
          return $sugar;
        }
        else
        {
          $sugar["text"] = "Elevé, ne correspond à vos préférences";
          $sugar["color"] = "#d42f2f";
          return $sugar;
        }
      }
      if ($user->sugar == 'high')
      {
        if ($json["product"]["nutrient_levels"]["sugars"] == 'low')
        {
          $sugar["text"] = "Faible, validé par rapport à vos préférences";
          $sugar["color"] = "#66ff99";
          return $sugar;
        }
        elseif ($json["product"]["nutrient_levels"]["sugars"] == 'medium')
        {
          $sugar["text"] = "Moyen, validé par rapport à vos préférences";
          $sugar["color"] = "#66ff99";
          return $sugar;
        }
        else
        {
          $sugar["text"] = "Elevé, validé par rapport à vos préférences";
          $sugar["color"] = "#66ff99";
          return $sugar;
        }
      }
    }


    // Fonction pour le sel
    public function nutrimentLevelSalt ($user, $json) {
      if ($user->salt == 'low')
      {
        if ($json["product"]["nutrient_levels"]["salt"] == 'low')
        {
          $salt["text"] = "Faible, validé par rapport à vos préférences";
          $salt["color"] = "#66ff99";
          return $salt;
        }
        elseif ($json["product"]["nutrient_levels"]["salt"] == 'medium')
        {
          $salt["text"] = "Moyen, ne correspond pas à vos préférences";
          $salt["color"] = "#d42f2f";
          return $salt;
        }
        else
        {
          $salt["text"] = "Elevé, ne correspond à vos préférences";
          $salt["color"] = "#d42f2f";
          return $salt;
        }
      }
      if ($user->salt == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["salt"] == 'low')
        {
          $salt["text"] = "Faible, validé par rapport à vos préférences";
          $salt["color"] = "#66ff99";
          return $salt;
        }
        elseif ($json["product"]["nutrient_levels"]["salt"] == 'medium')
        {
          $salt["text"] = "Moyen, validé par rapport à vos préférences";
          $salt["color"] = "#66ff99";
          return $salt;
        }
        else
        {
          $salt["text"] = "Elevé, ne correspond à vos préférences";
          $salt["color"] = "#d42f2f";
          return $salt;
        }
      }
      if ($user->salt == 'high')
      {
        if ($json["product"]["nutrient_levels"]["salt"] == 'low')
        {
          $salt["text"] = "Faible, validé par rapport à vos préférences";
          $salt["color"] = "#66ff99";
          return $salt;
        }
        elseif ($json["product"]["nutrient_levels"]["salt"] == 'medium')
        {
          $salt["text"] = "Moyen, validé par rapport à vos préférences";
          $salt["color"] = "#66ff99";
          return $salt;
        }
        else
        {
          $salt["text"] = "Elevé, validé par rapport à vos préférences";
          $salt["color"] = "#66ff99";
          return $salt;
        }
      }
    }


    // Fonction pour les matières grasses
    public function nutrimentLevelFat ($user, $json) {
      if ($user->fat == 'low')
      {
        if ($json["product"]["nutrient_levels"]["fat"] == 'low')
        {
          $fat["text"] = "Faible, validé par rapport à vos préférences";
          $fat["color"] = "#66ff99";
          return $fat;
        }
        elseif ($json["product"]["nutrient_levels"]["fat"] == 'medium')
        {
          $fat["text"] = "Moyen, ne correspond pas à vos préférences";
          $fat["color"] = "#d42f2f";
          return $fat;
        }
        else
        {
          $fat["text"] = "Elevé, ne correspond à vos préférences";
          $fat["color"] = "#d42f2f";
          return $fat;
        }
      }
      if ($user->fat == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["fat"] == 'low')
        {
          $fat["text"] = "Faible, validé par rapport à vos préférences";
          $fat["color"] = "#66ff99";
          return $fat;
        }
        elseif ($json["product"]["nutrient_levels"]["fat"] == 'medium')
        {
          $fat["text"] = "Moyen, validé par rapport à vos préférences";
          $fat["color"] = "#66ff99";
          return $fat;
        }
        else
        {
          $fat["text"] = "Elevé, ne correspond à vos préférences";
          $fat["color"] = "#d42f2f";
          return $fat;
        }
      }
      if ($user->fat == 'high')
      {
        if ($json["product"]["nutrient_levels"]["fat"] == 'low')
        {
          $fat["text"] = "Faible, validé par rapport à vos préférences";
          $fat["color"] = "#66ff99";
          return $fat;
        }
        elseif ($json["product"]["nutrient_levels"]["fat"] == 'medium')
        {
          $fat["text"] = "Moyen, validé par rapport à vos préférences";
          $fat["color"] = "#66ff99";
          return $fat;
        }
        else
        {
          $fat["text"] = "Elevé, validé par rapport à vos préférences";
          $fat["color"] = "#66ff99";
          return $fat;
        }
      }
    }


    // Fonction pour les matières grasses saturées
    public function nutrimentLevelSaturedFat ($user, $json) {
      if ($user->saturedFat == 'low')
      {
        if ($json["product"]["nutrient_levels"]["saturated-fat"] == 'low')
        {
          $saturedFat["text"] = "Faible, validé par rapport à vos préférences";
          $saturedFat["color"] = "#66ff99";
          return $saturedFat;
        }
        elseif ($json["product"]["nutrient_levels"]["saturated-fat"] == 'medium')
        {
          $saturedFat["text"] = "Moyen, ne correspond pas à vos préférences";
          $saturedFat["color"] = "#d42f2f";
          return $saturedFat;
        }
        else
        {
          $saturedFat["text"] = "Elevé, ne correspond à vos préférences";
          $saturedFat["color"] = "#d42f2f";
          return $saturedFat;
        }
      }
      if ($user->saturedFat == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["saturated-fat"] == 'low')
        {
          $saturedFat["text"] = "Faible, validé par rapport à vos préférences";
          $saturedFat["color"] = "#66ff99";
          return $saturedFat;
        }
        elseif ($json["product"]["nutrient_levels"]["saturated-fat"] == 'medium')
        {
          $saturedFat["text"] = "Moyen, validé par rapport à vos préférences";
          $saturedFat["color"] = "#66ff99";
          return $saturedFat;
        }
        else
        {
          $saturedFat["text"] = "Elevé, ne correspond à vos préférences";
          $saturedFat["color"] = "#d42f2f";
          return $saturedFat;
        }
      }
      if ($user->saturedFat == 'high')
      {
        if ($json["product"]["nutrient_levels"]["saturated-fat"] == 'low')
        {
          $saturedFat["text"] = "Faible, validé par rapport à vos préférences";
          $saturedFat["color"] = "#66ff99";
          return $saturedFat;
        }
        elseif ($json["product"]["nutrient_levels"]["saturated-fat"] == 'medium')
        {
          $saturedFat["text"] = "Moyen, validé par rapport à vos préférences";
          $saturedFat["color"] = "#66ff99";
          return $saturedFat;
        }
        else
        {
          $saturedFat["text"] = "Elevé, validé par rapport à vos préférences";
          $saturedFat["color"] = "#66ff99";
          return $saturedFat;
        }
      }
    }
}
