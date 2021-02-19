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
        $users = User::orderBy('nm_user', 'ASC')->get();;
        return view('users/index', compact('users'));
    }
   

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:5|max:20|unique:users',
            'nm_user' => 'required|min:6|max:50',
            'password' => 'required|min:6|max:20',
            'nik' => 'required|min:16|max:20',  
            'no_telp' => 'required|min:7|max:15',
        ]);

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
        $this->validate($request, [
            'username' => 'min:5|max:20|unique:users,username,'.$id.',id_user',
            'nm_user' => 'min:6|max:50',
            'nik' => 'min:16|max:20', 
            'no_telp' => 'min:7|max:15',
            'foto_user' => 'mimes:jpg,jpeg,png'   
        ]);
        
        $users = User::where('id_user', $id)->first();

        $users->username = $request->username;
        $users->nm_user = $request->nm_user;
        $users->nik = $request->nik;
        $users->email = $request->email;
        $users->no_telp = $request->no_telp;
        $users->jns_kelamin = $request->jns_kelamin;
        if($request->hasFile('foto_user')){
            if(auth()->guard('user')->user()) {
                $file = $request->foto_user;

                $file->move('avatar_user', $file->getClientOriginalName());

                $users->foto_user = $file->getClientOriginalName();
            }
        }
        $users->level = $request->level;
        $users->status = $request->status;
        $users->save();
        
        return redirect('/user')->with('success', 'Data berhasil dirubah!');
    }
}