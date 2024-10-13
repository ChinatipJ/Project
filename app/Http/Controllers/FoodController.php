<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FoodController extends Controller
{
    function show(): View
    {
        return view('foods.view');
    }

    function list(Request $request): View
    {
        return view('foods.list');
    }

}
