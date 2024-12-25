<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // This is the login view you created earlier
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login data
        $validator = Validator::make($request->all(), [
            'username' => 'required|email', // assuming you use email as username
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to login the user
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            // Login successful, redirect to home
            return redirect()->intended('/home'); // You can replace '/home' with the desired route
        }

        // Login failed
        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    // Handle logout logic
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
