<?php

namespace Niharb\MyForm\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Niharb\MyForm\Models\PackageUser;

class AuthController extends Controller
{
    // Show Registration Form
    public function showRegistrationForm(): View
    {
        return view('my-form::auth.register');
    }

    // Handle Registration
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:package_users',
            'email' => 'required|string|email|max:255|unique:package_users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        PackageUser::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('my-form.login.create')->with('success', 'Registration successful! Please login.');
    }

    // Show Login Form
    public function showLoginForm(): View
    {
        return view('my-form::auth.login');
    }

    // Handle Login
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('package_web')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('my-form.hello');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email')->with('error', 'Login failed! Please check your credentials.');
    }

    // Handle Logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('package_web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('my-form.login.create')->with('success', 'You have been logged out.');
    }

    // Show Hello Page (Protected Route)
    public function hello(): View
    {
        return view('my-form::hello');
    }
}