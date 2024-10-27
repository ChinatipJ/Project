<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends LayoutController
{
    function show(): View
    {
        return view('home.form');
    }
    
}
