<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{

    public function __construct() {
        $this->middleware('guest');
    }

    //
    public function index()
    {
        return view('landing.index');
    }
}
