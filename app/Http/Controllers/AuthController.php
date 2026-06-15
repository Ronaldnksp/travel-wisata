<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }

    public function login(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email','password' => 'required']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Auth::user()->isAdmin() ? redirect()->route('admin.dashboard') : redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    }

    public function showRegister() { return view('auth.register'); }

    public function register(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255','email' => 'required|email|unique:users','password' => 'required|min:6|confirmed','phone' => 'nullable|string|max:20']);
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'user';
        User::create($validated);
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
