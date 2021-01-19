<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
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
        return view('users.tambah_userAdmin');
    }

    public function indexDashAdmin()
    {
        return view('layout.dashboard_admin');
    }

    public function list()
    {
        $users = User::all();
        // dd($users);
        return view('users/list_userAdmin', compact('users'));
    }

    public function create()
    {
        //kk
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'foto_user' => request('foto_user'),
            'level' => request('level'),
            'status' => request('status'),
        ]);
        return redirect('/list_userAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('users/edit_userAdmin', compact('user'));
    }

    public function editUserProsesAdmin (Request $request, $id)
    {
        DB::table('users')->where('id_user', $id)
            -> update([
                'username' => request('username'),
                'password' => Hash::make(request('password')),
                'nm_user' => request('nm_user'),
                'nik' => request('nik'),
                'email' => request('email'),
                'no_telp' => request('no_telp'),
                'jns_kelamin' => request('jns_kelamin'),
                'foto_user' => request('foto_user'),
                'level' => request('level'),
                'status' => request('status'),
            ]);
            
        return redirect('/list_userAdmin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function detailUserAdmin($id)
    {
        $detailUserAdmin = User::find($id);
        return view ('users/detail_userAdmin',['detailUserAdmin' => $detailUserAdmin]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
