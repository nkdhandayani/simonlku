<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

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
                return redirect('/dashboard');
            }
        }
        else if($request->login_as == "biro_perjalanan_wisata"){
            if (Auth::guard('bpw')->attempt($request->only('username', 'password'))) {
                $bpw = \App\Models\BPW::where('username', $request->username)->first();
                return redirect('/dashboard');
            }
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        Auth::guard('bpw')->logout();
        return redirect('/');
    }
}