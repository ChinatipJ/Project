<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


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
}
