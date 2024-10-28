<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Auth;

class FoodController extends LayoutController
{
    
    public function show($food): View
{
    
    $food = Food::with('user')->findOrFail($food);

    $reviews = DB::table('foods2reviews')
    ->join('reviews', 'foods2reviews.review_id', '=', 'reviews.id')
    ->join('users', 'reviews.user_id', '=', 'users.id') 
    ->orderBy('reviews.created_at', 'desc')
    ->select('reviews.*', 'users.name as user_name') 
    ->get();
   
    $averageRating = round($food->reviews()->average('star'), 2) ?? 0;

    return view('foods.view', compact('food', 'averageRating', 'reviews'));
}

function control(): View
{

    if (Auth::user()->role === 'ADMIN') {

        $foods = Food::orderBy('created_at', 'DESC')->get();

    } else {

        $foods = Food::where('user_id', Auth::id())
                     ->orderBy('created_at', 'DESC')
                     ->get();

    }

    return view('foods.control', compact('foods'));
}




    function list(): View
    {
        $foods = Food::orderBy('created_at', 'DESC')->get();
        return view('foods.list',compact('foods'));

    }

    function ShowFormCreate(): View
    {
        $categories = Category::all();
        return view('foods.create',compact('categories'));
    }

    public function CreateAdd(Request $request)
{
    try {
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
 
    Food::create($validated);

        
        return redirect()->route('foods.list')->with('success', 'Food added successfully!');
    } catch (\Exception $e) {
      
        return redirect()->route('foods.create')->with('error', 'Failed to add food. Please try again.');
    }
}



    function Update(string $foodid): View
    {
      
        $food = Food::where('id', $foodid)
        ->where('user_id', Auth::id())
        ->firstOrFail();
        $categories = Category::all();

        return view('foods.update', [
            'food' => $food,
            'categories' => $categories,
        ]);
    }
    function delete($food) {
        $food = Food::findOrFail($food);
        $food->delete();
        return redirect()->route('foods.control')->with('success', 'Category deleted successfully!');

    }


    public function updateNew(Request $request, Food $food)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredient' => 'nullable|string',
            'stepfood' => 'string',
            'time' => 'nullable|string',
            'category_id' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
       
        $food->name = $request->name;
        $food->description = $request->description;
        $food->ingredient = $request->ingredient;
        $food->stepfood = $request->stepfood;
        $food->time = $request->time;
        $food->category_id = $request->category_id;
    
      
        if ($request->hasFile('img')) {
      
            if ($food->img && Storage::exists('images/' . $food->img)) {
                Storage::delete('images/' . $food->img);
            }
            
            
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $food->img = $imageName; 
        }
    
        $food->save();
    
        
        return redirect()->route('foods.control')->with('success', 'Food updated successfully!');
    }
    
}    