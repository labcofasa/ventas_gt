<?php

namespace App\Http\Controllers;

use App\Models\Publicidad;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
