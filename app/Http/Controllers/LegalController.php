<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
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

    public function legalmentions()
    {
        return view('legalmentions');
    }

    public function cgu()
    {
        return view('cgu');
    }
}
