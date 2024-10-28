<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends Controller
{
    function show(): View
    {
        return view('logins.form');
    }

    function logout(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();

        // regenerate CSRF token
        session()->regenerateToken();

        return redirect()->route('login');
    }
    function authenticate(ServerRequestInterface $request): RedirectResponse
    {

        // get credentials from user.
        $data = $request->getParsedBody();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        // authenticate by using method attempt()
        if (Auth::attempt($credentials)) {
            // regenerate the new session ID
            session()->regenerate();

            // redirect to the requested URL or
            // to route products.list if does not specify
            return redirect()->intended(route('home.form'));
        }
        return redirect()->back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }
    public function showRegister()
    {

        return view('logins.register'); 
    }

    public function register(Request $request)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile' => 'nullable|string|max:45',
        ]);
    

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
            'role' => 'USER', 
            'profile' => $request->profile,
        ]);
    

        return redirect()->route('login')->with('success', 'Registration successful! You are now logged in.');
    }
    

}
