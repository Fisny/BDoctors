<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAppController extends Controller
{
    public function home()
    {
        return view('app.home');
    }

    public function home2()
    {
        return view('app.home2');
    }

    public function filter()
    {
        return view('app.filterDoc');
    }
}
