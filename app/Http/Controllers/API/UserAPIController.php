<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;

class UserAPIController extends Controller
{

    public function getPreferences ($id) {

        $user = User::findOrFail($id);

        $json = array(
          'user' => array(
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'preferences' => array(
              'nutrients' => array(
                'salt' => $user->salt,
                'sugar' => $user->sugar,
                'fat' => $user->fat,
                'saturated_fat' => $user->saturedFat,
                'palm_oil' => (bool) $user->palmOil,
                'calories' => $user->caloriesMax,
              ),
              'additives' => $user->additives
            )
          ),
          'last_update' => $user->updated_at
        );

        return $json;
    }

    public function updatePreferences ($id) {
      $user = User::findOrFail($id);
      $data = Input::all();

      $inputs['salt'] = $data["user"]["preferences"]["nutrients"]["salt"];
      $inputs['sugar'] = $data["user"]["preferences"]["nutrients"]["sugar"];
      $inputs['fat'] = $data["user"]["preferences"]["nutrients"]["fat"];
      $inputs['saturedFat'] = $data["user"]["preferences"]["nutrients"]["saturated_fat"];
      $inputs['palmOil'] = $data["user"]["preferences"]["nutrients"]["palm_oil"];
      $inputs['calories'] = $data["user"]["preferences"]["nutrients"]["calories"];
      $inputs['additives'] = $data["user"]["preferences"]["additives"];

      $inputs['updated_at'] = new \DateTime("now", new \DateTimeZone('Europe/Paris'));

      DB::table('users')->where('id', '=', $user->id)->update($inputs);

      return array('test' => $inputs['additives']);
    }
    
}
