<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(Request $request) : View
    {
        $title= "About";
        return view('about', [
            "title" =>  $title
        ]);
    }
}
