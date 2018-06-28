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
          
            $inputs[$i]["name"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['name'])->first();
            $inputs[$i]["status"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['status'])->first();
            $inputs[$i]["image"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['image'])->first();

            $i++;
          }

          $i--;

          return view('dashboard', compact('inputs','i', 'user'));
    }
}
