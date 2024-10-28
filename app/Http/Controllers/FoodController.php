<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FoodController extends LayoutController
{
    // function show(): View
    // {
    //     return view('foods.view');
    // }
    public function show($food): View
{
    // ดึงข้อมูลอาหารพร้อมกับผู้ใช้
    $food = Food::with('user')->findOrFail($food);

    $reviews = DB::table('foods2reviews')
    ->join('reviews', 'foods2reviews.review_id', '=', 'reviews.id')
    ->join('users', 'reviews.user_id', '=', 'users.id') // ดึงข้อมูลผู้ใช้
    ->where('foods2reviews.food_id', $food->id)
    ->orderBy('reviews.created_at', 'desc')
    ->select('reviews.*', 'users.name as user_name') // เลือกข้อมูลรีวิวและชื่อผู้ใช้
    ->get();
    // คำนวณค่าเฉลี่ยของรีวิว
    $averageRating = round($food->reviews()->average('star'), 2) ?? 0;

    return view('foods.view', compact('food', 'averageRating', 'reviews'));
}

    function control(Request $request): View
{
    // ดึงข้อมูลรายการอาหารที่ผู้ใช้ที่ล็อกอินเป็นคนสร้าง
    $foods = Food::where('user_id', Auth::id())
                 ->orderBy('created_at', 'DESC')
                 ->get();

    return view('foods.control', compact('foods'));
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
        $foods = Food::where('user_id', Auth::id())
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('foods.control',compact('foods'));

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