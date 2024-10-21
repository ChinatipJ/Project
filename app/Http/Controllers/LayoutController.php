<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Database\Eloquent\Builder;

class LayoutController extends SearchController
{
    //ล็อตเต้ใช้ ไว้เพื่อให้ Search รู้ว่า datebase ก่อนไหนใช้ดึง เพื่อจะใช้ ดึงอย่างอื่น
    public function getQuery(): Builder
    {
        return Food::query();
    }
    public function handleSearch(Request $request)
    {
        // Prepare search input
        $search = $this->prepareSearch($request->all());

        // Get the filtered foods
        $foods = $this->filter($this->getQuery(), $search)->get();

        // Return the results to a view
        return view('foods.list',[
            'foods'=>$foods,
            'search'=>$search
        ]);
    }

    public function __construct()
    {  
        $categories = Category::all();
        view()->share('categories', $categories);
    }
}
