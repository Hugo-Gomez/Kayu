<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ProductController extends Controller
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

    public function index($i) {

      $user = Auth::user();
      $history = DB::table('history')->where('user_id','=',$user->id)->get(['barcode']);
      $additives = DB::table('additives')->get();
      $user = Auth::user();

      $json = json_decode(file_get_contents('https://world-fr.openfoodfacts.org/api/v0/produit/' . $history[$i]->barcode . '.json'), true);

      $inputs["name"] = $json["product"]["product_name_fr"];
      $inputs["barcode"] = $json["product"]["code"];
      $inputs["energy_value"] = $json["product"]["nutriments"]["energy_value"];

      if ($inputs["energy_value"] < $user->caloriesMax)
      {
        $inputs["energy_value_color"] = "green";
        $inputs["energy_value_text"] = "Est inférieur à vos préférences";
      }
      else {
        $inputs["energy_value_color"] = "red";
        $inputs["energy_value_text"] = "Est supérieur à vos préférences";
      }
      $inputs["energy_unit"] = $json["product"]["nutriments"]["energy_unit"];

      $inputs["additives_tags"] = $json["product"]["additives_tags"];
      $inputs["ingredients_tags"] = $json["product"]["ingredients_tags"];

      if ($json["product"]["nutrient_levels"] != null)
      {
        $inputs["nutrient_levels"] = $json["product"]["nutrient_levels"];
        $inputs["sugar"]=self::nutrimentLevelSugar($user, $json);
        $inputs["salt"]=self::nutrimentLevelSalt($user, $json);
        $inputs["fat"]=self::nutrimentLevelFat($user, $json);
        $inputs["saturedFat"]=self::nutrimentLevelSaturedFat($user, $json);
      }
      else $inputs["nutrient_levels"] = 0;

      $inputs["PalmOil"] = $json["product"]["ingredients_from_palm_oil_tags"];
      $inputs["MaybePalmOil"] = $json["product"]["ingredients_that_may_be_from_palm_oil_tags"];

      $inputs["image"] = $json["product"]["image_small_url"];

      if ($json["product"]["image_ingredients_url"] != null)
      {
          $inputs["ingredients_image"] = $json["product"]["image_ingredients_url"];
      }

      return view('product', compact('inputs','additives','user'));
    }


    // Fonction pour le sucre
    public function nutrimentLevelSugar ($user, $json) {
      if ($user->sugar == 'low')
      {
        if ($json["product"]["nutrient_levels"]["sugars"] == 'low')
        {
          $sugar["text"] = "Faible, correspond à vos préférences";
          $sugar["color"] = "green";
          return $sugar;
        }
        elseif ($json["product"]["nutrient_levels"]["sugars"] == 'medium')
        {
          $sugar["text"] = "Moyen, ne correspond pas à vos préférences";
          $sugar["color"] = "red";
          return $sugar;
        }
        else
        {
          $sugar["text"] = "Elevé, ne correspond à vos préférences";
          $sugar["color"] = "red";
          return $sugar;
        }
      }
      if ($user->sugar == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["sugars"] == 'low')
        {
          $sugar["text"] = "Faible, correspond à vos préférences";
          $sugar["color"] = "green";
          return $sugar;
        }
        elseif ($json["product"]["nutrient_levels"]["sugars"] == 'medium')
        {
          $sugar["text"] = "Moyen, correspond à vos préférences";
          $sugar["color"] = "green";
          return $sugar;
        }
        else
        {
          $sugar["text"] = "Elevé, ne correspond à vos préférences";
          $sugar["color"] = "red";
          return $sugar;
        }
      }
      if ($user->sugar == 'high')
      {
        if ($json["product"]["nutrient_levels"]["sugars"] == 'low')
        {
          $sugar["text"] = "Faible, correspond à vos préférences";
          $sugar["color"] = "green";
          return $sugar;
        }
        elseif ($json["product"]["nutrient_levels"]["sugars"] == 'medium')
        {
          $sugar["text"] = "Moyen, correspond à vos préférences";
          $sugar["color"] = "green";
          return $sugar;
        }
        else
        {
          $sugar["text"] = "Elevé, correspond à vos préférences";
          $sugar["color"] = "green";
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
          $salt["text"] = "Faible, correspond à vos préférences";
          $salt["color"] = "green";
          return $salt;
        }
        elseif ($json["product"]["nutrient_levels"]["salt"] == 'medium')
        {
          $salt["text"] = "Moyen, ne correspond pas à vos préférences";
          $salt["color"] = "red";
          return $salt;
        }
        else
        {
          $salt["text"] = "Elevé, ne correspond à vos préférences";
          $salt["color"] = "red";
          return $salt;
        }
      }
      if ($user->salt == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["salt"] == 'low')
        {
          $salt["text"] = "Faible, correspond à vos préférences";
          $salt["color"] = "green";
          return $salt;
        }
        elseif ($json["product"]["nutrient_levels"]["salt"] == 'medium')
        {
          $salt["text"] = "Moyen, correspond à vos préférences";
          $salt["color"] = "green";
          return $salt;
        }
        else
        {
          $salt["text"] = "Elevé, ne correspond à vos préférences";
          $salt["color"] = "red";
          return $salt;
        }
      }
      if ($user->salt == 'high')
      {
        if ($json["product"]["nutrient_levels"]["salt"] == 'low')
        {
          $salt["text"] = "Faible, correspond à vos préférences";
          $salt["color"] = "green";
          return $salt;
        }
        elseif ($json["product"]["nutrient_levels"]["salt"] == 'medium')
        {
          $salt["text"] = "Moyen, correspond à vos préférences";
          $salt["color"] = "green";
          return $salt;
        }
        else
        {
          $salt["text"] = "Elevé, correspond à vos préférences";
          $salt["color"] = "green";
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
          $fat["text"] = "Faible, correspond à vos préférences";
          $fat["color"] = "green";
          return $fat;
        }
        elseif ($json["product"]["nutrient_levels"]["fat"] == 'medium')
        {
          $fat["text"] = "Moyen, ne correspond pas à vos préférences";
          $fat["color"] = "red";
          return $fat;
        }
        else
        {
          $fat["text"] = "Elevé, ne correspond à vos préférences";
          $fat["color"] = "red";
          return $fat;
        }
      }
      if ($user->fat == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["fat"] == 'low')
        {
          $fat["text"] = "Faible, correspond à vos préférences";
          $fat["color"] = "green";
          return $fat;
        }
        elseif ($json["product"]["nutrient_levels"]["fat"] == 'medium')
        {
          $fat["text"] = "Moyen, correspond à vos préférences";
          $fat["color"] = "green";
          return $fat;
        }
        else
        {
          $fat["text"] = "Elevé, ne correspond à vos préférences";
          $fat["color"] = "red";
          return $fat;
        }
      }
      if ($user->fat == 'high')
      {
        if ($json["product"]["nutrient_levels"]["fat"] == 'low')
        {
          $fat["text"] = "Faible, correspond à vos préférences";
          $fat["color"] = "green";
          return $fat;
        }
        elseif ($json["product"]["nutrient_levels"]["fat"] == 'medium')
        {
          $fat["text"] = "Moyen, correspond à vos préférences";
          $fat["color"] = "green";
          return $fat;
        }
        else
        {
          $fat["text"] = "Elevé, correspond à vos préférences";
          $fat["color"] = "green";
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
          $saturedFat["text"] = "Faible, correspond à vos préférences";
          $saturedFat["color"] = "green";
          return $saturedFat;
        }
        elseif ($json["product"]["nutrient_levels"]["saturated-fat"] == 'medium')
        {
          $saturedFat["text"] = "Moyen, ne correspond pas à vos préférences";
          $saturedFat["color"] = "red";
          return $saturedFat;
        }
        else
        {
          $saturedFat["text"] = "Elevé, ne correspond à vos préférences";
          $saturedFat["color"] = "red";
          return $saturedFat;
        }
      }
      if ($user->saturedFat == 'medium')
      {
        if ($json["product"]["nutrient_levels"]["saturated-fat"] == 'low')
        {
          $saturedFat["text"] = "Faible, correspond à vos préférences";
          $saturedFat["color"] = "green";
          return $saturedFat;
        }
        elseif ($json["product"]["nutrient_levels"]["saturated-fat"] == 'medium')
        {
          $saturedFat["text"] = "Moyen, correspond à vos préférences";
          $saturedFat["color"] = "green";
          return $saturedFat;
        }
        else
        {
          $saturedFat["text"] = "Elevé, ne correspond à vos préférences";
          $saturedFat["color"] = "red";
          return $saturedFat;
        }
      }
      if ($user->saturedFat == 'high')
      {
        if ($json["product"]["nutrient_levels"]["saturated-fat"] == 'low')
        {
          $saturedFat["text"] = "Faible, correspond à vos préférences";
          $saturedFat["color"] = "green";
          return $saturedFat;
        }
        elseif ($json["product"]["nutrient_levels"]["saturated-fat"] == 'medium')
        {
          $saturedFat["text"] = "Moyen, correspond à vos préférences";
          $saturedFat["color"] = "green";
          return $saturedFat;
        }
        else
        {
          $saturedFat["text"] = "Elevé, correspond à vos préférences";
          $saturedFat["color"] = "green";
          return $saturedFat;
        }
      }
    }
}
