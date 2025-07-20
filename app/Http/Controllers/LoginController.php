<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\UserActivity;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.form.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // Log user activity just once per session after login
            if (!session()->has('dashboard_logged')) {
                UserActivity::create([
                    'user_id' => $user->id,
                    'activity' => 'Logged In',
                    'ip_address' => $request->ip(),
                ]);

                session()->put('dashboard_logged', true);
            }

            switch ($user->role) {
                case 'admin':
                    return redirect()->route('backend.dashboard');
                default:
                    return redirect()->route('frontend.index');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Clear dashboard_logged flag so it logs next time correctly
        session()->forget('dashboard_logged');

        return redirect()->route('frontend.index')->with('message', 'Logout successful!');
    }
}
