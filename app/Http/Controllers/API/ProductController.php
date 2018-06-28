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

      $inputs['user_id'] = $data["user_id"];
      $inputs['barcode'] = $data["barcode"];
      $inputs['status'] = $data["status"];
      $inputs['updated_at'] = $date;
      $inputs['created_at'] = $date;

      DB::table('history')->insert($inputs);

      return $data;
    }


}
