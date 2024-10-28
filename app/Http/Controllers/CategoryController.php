<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CategoryController extends LayoutController
{
    public function list($category): View
    {
        // ค้นหาหมวดหมู่ที่คลิกมา
        $category = Category::findOrFail($category);

        // กรองรายการอาหารตามหมวดหมู่ที่เลือก
        $foods = Food::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();

        // ส่งหมวดหมู่และรายการอาหารไปยัง view 'categories.list'
        return view('categories.list', compact('foods', 'category'));
    }
    public function control(Request $request): View
    {
        Gate::authorize('Create', Category::class);
        $categories = Category::orderBy('created_at', 'DESC')->get();

       
        return view('categories.control', compact('categories'));
    }
    function Update(string $categoryid): View
    {
        Gate::authorize('Create', Category::class);
        $categories = Category::where('id', $categoryid)->firstOrFail();

        return view('categories.update', [
            'category' => $categories,
        ]);
    }
    function delete($categoryid) {
        Gate::authorize('Create', Category::class);
        $category = Category::findOrFail($categoryid);
        $category->delete();
    
        return redirect()->route('categories.control')->with('success', 'Category deleted successfully!');
    }
    

    public function updateNew(Request $request, Category $category)
{
    Gate::authorize('Create', Category::class);
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category->name = $request->name;
    
   
    $category->save();

    return redirect()->route('categories.control')->with('success', 'Category updated successfully!');
}

public function create(): View
{
    Gate::authorize('Create', Category::class);
    return view('categories.create');
}
public function CreateNew(Request $request)
{
    Gate::authorize('Create', Category::class);
    try {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);


 
    Category::create($validated);

        
        return redirect()->route('categories.control')->with('success', 'Food added successfully!');
    } catch (\Exception $e) {
      
        return redirect()->route('categories.create')->with('error', 'Failed to add food. Please try again.');
    }
}

   
}
