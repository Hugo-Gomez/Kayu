<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;

class FormPrefController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      return view('formpref', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function formok(Request $request)
    {
      // On récupère l'utilisateur co et la table des profils
      $user = Auth::user();

      $inputs['caloriesMax'] = Input::get('kcal');

      $inputs['palmOil'] = Input::get('palmOil');

      $inputs['salt'] = Input::get('salt');
      $inputs['sugar'] = Input::get('sugar');
      $inputs['fat'] = Input::get('fat');
      $inputs['saturedFat'] = Input::get('saturedFat');

      $inputs['additives'] = Input::get('additives');

      $inputs['updated_at'] = new \DateTime("now", new \DateTimeZone('Europe/Paris'));

      DB::table('users')->where('id', '=', $user->id)->update($inputs);

      return view('formpref', compact('user'));
    }
}
