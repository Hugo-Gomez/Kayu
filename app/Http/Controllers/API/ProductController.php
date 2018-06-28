<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;

class ProductController extends Controller
{

    public function getHistory ($id) {

        $user = User::findOrFail($id);

        $products = DB::table('history')->where('user_id', '=', $user->id)->orderBy('created_at', 'DESC')->get()->all();

        return $products;
    }

    public function addProduct ($id) {
      $user = User::findOrFail($id);
      $data = Input::all();
      $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));

      $json = json_decode(file_get_contents('https://world-fr.openfoodfacts.org/api/v0/produit/' . $data["barcode"] . '.json'), true);
      $inputs['user_id'] = $data["user_id"];
      $inputs['name'] = $json["product"]["product_name_fr"];
      $inputs['image'] = $json["product"]["image_small_url"];
      $inputs['barcode'] = $data["barcode"];
      $inputs['status'] = $data["status"];
      $inputs['updated_at'] = $date;
      $inputs['created_at'] = $date;

      DB::table('history')->insert($inputs);

      return $data;
    }


}
