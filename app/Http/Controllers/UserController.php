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
        $users = User::all();
        return view('users/index', compact('users'));
    }

    
    public function create()
    {
        return view('users/tambah_user');
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
            'foto_user' => file_get_contents($request->file('foto_user')->getRealPath()),
            'level' => request('level'),
            'status' => request('status'),
        ]);
        return view('users/index');
    }
    

    public function show($id)
    {
        $detail_user = User::find($id);
        return view ('users/detail_user', compact('detail_user'));
    }
    

    public function edit($id)
    {
        $user = User::find($id);
        return view('users/edit_user', compact('user'));
    }
    

    public function update(Request $request, $id)
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
                'foto_user' => file_get_contents($request->file('foto_user')->getRealPath()),
                'level' => request('level'),
                'status' => request('status'),
            ]);
            
        return view('user/index');
    }


    public function destroy($id)
    {
        //
    }
}















    // public function index2()
    // {
    //     return view('users.tambah_user');
    // }




    // public function indexDashAdmin()
    // {
    //     return view('layout.dashboard_admin');
    // }

    // public function list()
    // {
    //     $users = User::all();
    //     // dd($users);
    //     return view('users/list_userAdmin', compact('users'));
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    // public function edit_user (Request $request, $id)
    // {
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function detailUserAdmin($id)
    // {
    //     $detailUserAdmin = User::find($id);
    //     return view ('users/detail_userAdmin',['detailUserAdmin' => $detailUserAdmin]);
    // }

    // public function detail_user($id)
    // {
    //     $detail_user = User::find($id);
    //     return view ('users/detail_user',['detail_user' => $detail_user]);
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
