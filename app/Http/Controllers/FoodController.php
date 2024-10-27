<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class FoodController extends LayoutController
{
    // function show(): View
    // {
    //     return view('foods.view');
    // }
    function show($food): View
    {
      
        $food = Food::findOrFail($food);

       
        return view('foods.view', compact('food'));
    }

    function list(Request $request): View
    {
        $foods = Food::orderBy('created_at', 'DESC')->get();
        return view('foods.list',compact('foods'));

    }

    function ShowFormCreate(Request $request): View
    {
        $categories = Category::all();
        return view('foods.create',compact('categories'));
    }

    public function CreateAdd(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredient' => 'nullable|string',
            'stepfood' => 'string',
            'time' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer',
        ]);

        $validated['user_id'] = Auth::id();
    

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $validated['img'] = $imageName;
        }
    

        $food = Food::create($validated);
        return view('foods.create');
    }
    
}
 