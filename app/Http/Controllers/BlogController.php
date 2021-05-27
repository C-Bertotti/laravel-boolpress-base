<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index () 
    {
        //2. ritorno la view dell'homepage del sito;
        return view('guest.index');
    }
}
