<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request) : View{
        $title = "Developer Dashboard";
        return view("developer.dashboard", [
            "title"=> $title
        ]);
    }
}
