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
                if ($user->level == '0') {
                    return response()->view('layout/dashboard_admin');
                } elseif ($user->level == '1') {
                    return response()->view('layout/dashboard_staf');
                } elseif ($user->level == '2') {
                    return response()->view('layout/dashboard_kepala');
                }
                else
                {
                    return response()->view('auth.login');
                }
            }
        }
        else if($request->login_as == "biro_perjalanan_wisata"){
            if (Auth::guard('bpw')->attempt($request->only('username', 'password'))) {
                $bpd = \App\Models\BPW::where('username', $request->username)->first();
                return redirect('/dashboard_bpw');
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