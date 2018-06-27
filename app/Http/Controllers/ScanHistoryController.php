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
        //dd($history);
        foreach ($history as $h) {
            $json = json_decode(file_get_contents('https://world-fr.openfoodfacts.org/api/v0/produit/' . $h->barcode . '.json'), true);
            dd($json);
        }
        
        return view('history', compact('json'));
    }
}
