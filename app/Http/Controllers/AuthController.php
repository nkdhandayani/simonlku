<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use App\BPW;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if($request->login_as == "jasa_pariwisata"){
            if (Auth::guard('user')->attempt($request->only('username', 'password'))) {
                $user = \App\Models\User::where('username', $request->username)->first();
                return redirect('/dashboard')->with('success', 'Selamat Anda berhasil login!');
            }
        }
        else if($request->login_as == "biro_perjalanan_wisata"){
            if (Auth::guard('bpw')->attempt($request->only('username', 'password'))) {
                $bpw = \App\Models\BPW::where('username', $request->username)->first();
                return redirect('/dashboard')->with('success', 'Selamat Anda berhasil login!');
            }
        }

        if(!$request->login_as == "jasa_pariwisata" || !$request->login_as == "biro_perjalanan_wisata" || !$request->login_as == null) {
                return redirect('user-logout')->with('error', 'Data login yang Anda masukkan salah');
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        Auth::guard('bpw')->logout();
        if(session()->has('error')) {
            return redirect('/')->with('error', session()->get('error'));
        }
        return redirect('/');
    }
}