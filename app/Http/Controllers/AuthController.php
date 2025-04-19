<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'nama_lengkap' => 'required',
            'no_telp' => 'required',
            'nik' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'golongan_darah' => 'nullable',
            'alergi' => 'nullable'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->no_telp,
            'nik' => $request->nik,
            'email' => $request->email,
        ]);

        Pasien::create([
            'user_id' => $user->id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'alergi' => $request->alergi,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $role = Auth::user()->role;
            // dd("User role: " . $role); // This will show us the actual role value
            
            return redirect("/$role/dashboard");
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
