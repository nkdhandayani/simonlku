<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class BPWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bpw.tambah_bpwAdmin');
    }

     public function indexDashAdmin()
    {
        return view('layout.dashboard_admin');
    }
    public function indexDashStaf()
    {
        return view('layout.dashboard_staf');
    }
    public function indexDashKepala()
    {
        return view('layout.dashboard_kepala');
    }
    public function indexDashBPW()
    {
        return view('layout.dashboard_bpw');
    }

    public function listBPW()
    {
        $bpws = BPW::all();
        return view('bpw/list_bpwBPW', compact('bpws'));
    }

    public function listAdmin()
    {
        $bpws = BPW::all();
        return view('bpw/list_bpwAdmin', compact('bpws'));
    }
    public function listStaf()
    {
        $bpws = BPW::all();
        return view('bpw/list_bpwStaf', compact('bpws'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BPW::create([
            'nm_bpw' => request('nm_bpw'),
            'id_user' => Auth::user()->id_user,
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'email' => request('email'),
            'alamat' => request('alamat'),
            'kabupaten' => request('kabupaten'),
            'no_telp' => request('no_telp'),
            'no_fax' => request('no_fax'),
            'nm_pic' => request('nm_pic'),
            'nm_pimpinan' => request('nm_pimpinan'),
            'jns_bpw' => request('jns_bpw'),
            'sts_kantor' => request('sts_kantor'),
            'nib' => request('nib'),
            'foto_bpw' => request('foto_bpw'),
            'status' => request('status'),
        ]);

        return redirect('/list_bpwAdmin');
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
        $bpw = BPW::find($id);
        return view ('bpw/edit_bpwAdmin', compact('bpw'));
    }

    public function editBPWProsesAdmin (Request $request, $id)
    {
        DB::table('bpw')->where('id_bpw', $id)
            -> update([
                'id_user' => Auth::user()->id_user,
                'nm_bpw' => request('nm_bpw'),
                'username' => request('username'),
                'password' => Hash::make(request('password')),
                'email' => request('email'),
                'alamat' => request('alamat'),
                'kabupaten' => request('kabupaten'),
                'no_telp' => request('no_telp'),
                'no_fax' => request('no_fax'),
                'nm_pic' => request('nm_pic'),
                'nm_pimpinan' => request('nm_pimpinan'),
                'jns_bpw' => request('jns_bpw'),
                'sts_kantor' => request('sts_kantor'),
                'nib' => request('nib'),
                'foto_bpw' => file_get_contents($request->file('foto_bpw')->getRealPath()),
                'status' => request('status'),
                ]);

        return redirect('/list_bpwAdmin');
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

    public function detailBPWAdmin($id)
    {
        $detailBPWAdmin = BPW::find($id);
        return view ('bpw/detail_bpwAdmin',['detailBPWAdmin' => $detailBPWAdmin]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
