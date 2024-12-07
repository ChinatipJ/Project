<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends LayoutController
{
    function showself(User $userid): View
    {
        $user = User::findOrFail($userid->id);
        return view('users.self', compact('user'));
    }

    public function updateSelf(Request $request)
{
    
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        'profile' => 'nullable|string',
        'password' => 'nullable|min:8'
    ];

    $request->validate($rules);


    $user = Auth::user();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->profile = $request->profile;

 
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    try {
        $user->save();
        return redirect()->route('users.self', $user->id)
            ->with('success', 'Profile updated successfully');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Failed to update profile: ' . $e->getMessage()]);
    }
}

}
