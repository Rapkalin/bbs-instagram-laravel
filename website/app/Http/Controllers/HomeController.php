<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function landing()
    {
        return view('home.landing');
    }

}
