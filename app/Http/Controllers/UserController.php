<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users/index', compact('users'));
    }
   

    public function store(Request $request)
    {
        User::create([
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'nm_user' => request('nm_user'),
            'nik' => request('nik'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'jns_kelamin' => request('jns_kelamin'),
            'level' => request('level'),
            'status' => request('status'),
        ]);
        return redirect('/user')->with('success', 'Data berhasil ditambahkan!');
    }
    

    public function show($id)
    {
        $users = User::find($id);
        return view ('users/detail_user', compact('users'));
    }
    

    public function edit($id)
    {
        $users = User::find($id);
        return view('users/edit_user', compact('users'));
    }
    

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->username = $request->username;
        $users->nm_user = $request->nm_user;
        $users->nik = $request->nik;
        $users->email = $request->email;
        $users->no_telp = $request->no_telp;
        $users->jns_kelamin = $request->jns_kelamin;
        $users->level = $request->level;
        $users->status = $request->status;
        $users->save();
        
        return redirect('/user')->with('success', 'Data berhasil dirubah!');
    }


    public function destroy($id)
    {
        //
    }
}