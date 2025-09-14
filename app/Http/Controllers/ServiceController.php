<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request) : View
    {
        $title= "Service";

        return view('service', [
            "title" =>  $title
        ]);
    }
}
