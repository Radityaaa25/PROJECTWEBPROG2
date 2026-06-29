<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginFrontend()
    {
        return view('frontend.login');
    }

    public function registerFrontend()
    {
        return view('frontend.register');
    }

    public function storeRegisterFrontend(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'hp' => 'required|string|max:20',
        ]);

        \App\Models\User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validatedData['password']),
            'hp' => $validatedData['hp'],
            'role' => '2', // Customer (string to prevent MySQL ENUM index bug)
            'status' => 1, // Aktif
        ]);

        return redirect()->route('frontend.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function loginBackend()
    {
        return view('backend.v_login.login',[
            'judul'=>'Login Admin',
        ]);
    }
    
    public function authenticateBackend(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            if(Auth::user()->status == 0) {
                Auth::logout();
                return back()->with('error', 'User belum aktif');
            }
            if(Auth::user()->role == 2) { // Customer tidak boleh login ke backend
                Auth::logout();
                return back()->with('error', 'Akses ditolak. Anda bukan admin.');
            }
            $request->session()->regenerate();
            return redirect()->intended(route('backend.beranda'));
        }
        return back()->with('error', 'Login Gagal');
    }
    public function logoutBackend()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('backend.login'));
    }

    public function authenticateFrontend(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            if(Auth::user()->status == 0) {
                Auth::logout();
                return back()->with('error', 'Akun Anda belum aktif');
            }
            if(Auth::user()->role != 2) { // Admin/SuperAdmin yang mencoba login dari frontend
                Auth::logout();
                return back()->with('error', 'Silakan gunakan halaman login admin.');
            }
            $request->session()->regenerate();
            return redirect()->intended(route('frontend.home'));
        }
        return back()->with('error', 'Email atau Password salah.');
    }

    public function logoutFrontend()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('frontend.login'));
    }
}
