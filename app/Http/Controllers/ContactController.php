<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request) : View
    {
        $title= "Contact";

        return view('contact', [
            "title" =>  $title
        ]);
    }
}
