<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
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
        $history = DB::table('history')->where('user_id','=',$user->id)->orderBy('created_at', 'ASC')->get(['barcode']);

        $i = 1;

        foreach ($history as $h) {
            $json = json_decode(file_get_contents('https://world-fr.openfoodfacts.org/api/v0/produit/' . $h->barcode . '.json'), true);
            $inputs[$i]["name"] = $json["product"]["product_name_fr"];
            $inputs[$i]["status"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['status'])->first();
            $inputs[$i]["image"] = $json["product"]["image_small_url"];

            $i++;
          }

          $i--;

          return view('dashboard', compact('inputs','i', 'user'));
    }
}
