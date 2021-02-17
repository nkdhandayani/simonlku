<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index()
    {
        $bpws = Auth::guard('bpw')->user();
        $users = Auth::guard('user')->user();
        return view ('/profile/index', compact('bpws','users'));
    }


    public function edit()
    {
        $bpws = Auth::guard('bpw')->user();
        $users = Auth::guard('user')->user();
        return view('profile/edit_profile', compact('bpws', 'users'));
    }


    public function update(Request $request)
    {
        


    }


        public function destroy($id)
    {
        //
    }
}
