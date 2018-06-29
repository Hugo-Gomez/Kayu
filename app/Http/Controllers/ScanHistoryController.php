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
        $history = DB::table('history')->where('user_id','=',$user->id)->get();

        $i = 0;

        foreach ($history as $h) {
          $inputs[$i]["name"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['name'])->first();
          $inputs[$i]["barcode"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['barcode'])->first();
          $inputs[$i]["status"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['status'])->first();
          $inputs[$i]["image"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['image'])->first();
          $inputs[$i]["created_at"] = DB::table('history')->where('barcode','=',$h->barcode)->get(['created_at'])->first();

          $i++;
        }

        $i--;

        return view('history', compact('inputs','i','user'));

    }
}
