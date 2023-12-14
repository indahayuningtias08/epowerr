<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            // SweetAlert Success Popup
            Alert::success('Login successful!', 'Welcome ' . Auth::user()->name)->persistent(true, false);

            return redirect()->intended('/home');
        }

        // SweetAlert Error Popup
        Alert::error('Invalid credentials. Please try again.')->persistent(true, false);

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // SweetAlert Success Popup
        Alert::success('Logout successful!')->persistent(true, false);

        return redirect('/');
    }
}
