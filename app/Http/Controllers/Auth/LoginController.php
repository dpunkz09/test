<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        // Validate the input data
        $request->validate([
            'UserID' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('UserID', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt([
            'UserID' => $credentials['UserID'],
            'password' => $credentials['password'],
        ])) {
            // Authentication passed
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'UserID' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
