<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function __construct()
    {  
        $categories = Category::all();
        view()->share('categories', $categories);
    }
}
