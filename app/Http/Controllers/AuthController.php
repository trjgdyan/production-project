<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function handleLogin(Request $request)
    {
        // Validasi input
        $validate = $request->validate([
            'noreg' => 'required',
            'password' => 'required|min:5',
        ]);

        // Membatasi percobaan login untuk keamanan (contoh: 5 kali dalam 1 menit)
        if (!Auth::attempt(['noreg' => $validate['noreg'], 'password' => $validate['password']], $request->filled('remember'))) {
            return back()->withErrors([
                'error' => 'Noreg atau password salah',
            ])->withInput();
        }

        // Jika login berhasil
        return redirect()->intended('/');
    }
}
