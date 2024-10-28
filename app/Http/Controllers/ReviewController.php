<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ReviewController extends LayoutController
{
    // ฟังก์ชันเพื่อแสดงฟอร์มสร้างรีวิว
    public function create($food)
    {
        $food=Food::findOrFail($food);
        return view('review.form_create', compact('food')); // ส่ง food_id ไปยัง view
    }

    // ฟังก์ชันเพื่อจัดการการส่งฟอร์มรีวิว
    public function store(Request $request)
{
    $request->validate([
        'comment' => 'required|string|max:255',
        'star' => 'required|integer|between:1,5',
        'food_id' => 'required|exists:foods,id', // ตรวจสอบว่า food_id มีอยู่ในตาราง foods
    ]);

    // สร้างรีวิวใหม่
    $review = Review::create([
        'comment' => $request->comment,
        'star' => $request->star,
        'user_id' => Auth::id(), // ผู้ใช้งานที่ลงชื่อเข้าใช้
    ]);

    // บันทึกการเชื่อมโยงระหว่างรีวิวและอาหารใน review2food
        DB::table('foods2reviews')->insert([
        'review_id' => $review->id,
        'food_id' => $request->food_id,
    ]);

    return redirect()->route('foods.view', ['food' => $request->food_id])
                     ->with('success', 'Review submitted successfully!');
    }

    public function destroy($id)
{
    $review = Review::findOrFail($id);


    if ($review->user_id === Auth::id()) {
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully!');
    }

    return redirect()->back()->with('error', 'You are not authorized to delete this review.');
}

public function edit($id)
{
    $review = Review::findOrFail($id);
    
    // ตรวจสอบว่าผู้ใช้ที่ล็อกอินคือเจ้าของรีวิวหรือไม่
    if ($review->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'You are not authorized to edit this review.');
    }

    return view('review.edit', compact('review'));
}

public function update(Request $request, $id)
{
    // ตรวจสอบข้อมูลที่ส่งมาจากฟอร์ม
    $request->validate([
        'comment' => 'required|string|max:255',
        'star' => 'required|integer|min:1|max:5',
    ]);

    // ค้นหารีวิว
    $review = Review::findOrFail($id);

    // ตรวจสอบผู้ใช้
    if ($review->user_id === Auth::id()) {
        // อัปเดตรีวิว
        $review->update([
            'comment' => $request->comment,
            'star' => $request->star,
        ]);

        // ดึง food_id จาก foods2reviews
        $foodId = DB::table('foods2reviews')
            ->where('review_id', $review->id)
            ->value('food_id');

        // ส่งกลับไปยังหน้าดูอาหาร
        return redirect()->route('foods.view', $foodId)->with('success', 'Review updated successfully!');
    }

    return redirect()->back()->with('error', 'You are not authorized to update this review.');
}


    
    

}
