<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.admin.login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Use model method
        $user = Auth::authenticate($request->username, $request->password);

        if ($user) {
            $request->session()->put('user_id', $user->user_id);
            $session = Auth::setSessionUserId($user->user_id, $request->session()->getId());
            // dd($session);
            return view('pages.admin.dashboard');
        }

        return back()->withErrors(['login' => 'Invalid username or password']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
