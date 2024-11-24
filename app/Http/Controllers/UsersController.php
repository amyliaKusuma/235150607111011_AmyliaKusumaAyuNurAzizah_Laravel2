<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /* REGISTRASI */
    public function create()
    {
        return view('Registrasi');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email', // Perbaikan di sini
            'password' => 'required|confirmed',
        ]);
        
        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('login.view')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /* LOGIN */
    public function viewLogin()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Untuk keamanan session

            // Ubah redirect ke halaman tambah blog
            return redirect()->route('blogs.create')->with('success', 'Login berhasil! Silakan mulai menulis blog Anda.');
        }

        // return back()->withErrors([
        //     'email' => 'Email atau password salah.',
        // ])->onlyInput('email');
    }

    /* LOGOUT */
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }

}