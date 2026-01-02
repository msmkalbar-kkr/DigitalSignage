<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{


    public function index()
    {
        $ulangTahun = DB::table('ulangTahun')->count();
        $pengumuman = DB::table('pengumuman')->count();
        $struktur = DB::table('strukturOrganisasi')->count();
        $data = [
            'ulangTahun' => $ulangTahun,
            'pengumuman' => $pengumuman,
            'struktur' => $struktur
        ];
        return view('admin.dashboard.dashboard')->with($data);
    }

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah'
        ]);
    }



    public function logout(Request $request)
    {
        // Auth::guard('admin')->logout();

        // hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
