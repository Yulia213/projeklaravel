<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login
    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan!']);
        }

        
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak cocok!']);
        }

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/index'); 
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Regist
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        $hashedPassword = Hash::make($request->password);

       
        $user = User::create([
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        
        if (!$user) {
            return back()->withErrors(['email' => 'Gagal membuat akun, coba lagi.']);
        }

        
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
