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
    /* *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bpws = BPW::all();
        return view('bpw/index', compact('bpws'));
    }


    public function create()
    {
        return view('bpw/tambah_bpw');
    }


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
            'foto_bpw' => '',
            'status' => request('status'),
        ]);

        return redirect('/bpw');
    }


    public function show($id)
    {
        $bpws = BPW::find($id);
        return view ('bpw/detail_bpw', compact('bpws'));
    }


    public function edit($id)
    {
        $bpws = BPW::find($id);
        return view ('bpw/edit_bpw', compact('bpws'));
    }


    public function update(Request $request, $id)
    { 
        $bpws = BPW::find($id);

        $bpws->nm_bpw = $request->nm_bpw;
        $bpws->username = $request->username;
        $bpws->password = $request->password;
        $bpws->email = $request->email;
        $bpws->kabupaten = $request->kabupaten;
        $bpws->no_telp = $request->no_telp;
        $bpws->no_fax = $request->no_fax;
        $bpws->nm_pic = $request->nm_pic;
        $bpws->nm_pimpinan = $request->nm_pimpinan;
        $bpws->jns_bpw = $request->jns_bpw;
        $bpws->sts_kantor = $request->sts_kantor;
        $bpws->nib = $request->nib;
        $bpws->foto_bpw = $request->foto_bpw;
        $bpws->status = $request->status;
        $bpws->save();

        return redirect('/bpw');
    }
    

    public function destroy($id)
    {
        //
    }
}



    // public function indexDashAdmin()
    // {
    //     return view('layout.dashboard_admin');
    // }
    // public function indexDashStaf()
    // {
    //     return view('layout.dashboard_staf');
    // }
    // public function indexDashKepala()
    // {
    //     return view('layout.dashboard_kepala');
    // }
    // public function indexDashBPW()
    // {
    //     return view('layout.dashboard_bpw');
    // }

    // public function listBPW()
    // {
    //     $bpws = BPW::all();
    //     return view('bpw/list_bpwBPW', compact('bpws'));
    // }

    // public function listAdmin()
    // {
    //     $bpws = BPW::all();
    //     return view('bpw/list_bpwAdmin', compact('bpws'));
    // }
    // public function listStaf()
    // {
    //     $bpws = BPW::all();
    //     return view('bpw/list_bpwStaf', compact('bpws'));
    // }
    

    // public function editBPWProsesAdmin (Request $request, $id)
    // {
    //     DB::table('bpw')->where('id_bpw', $id)
    //         -> update([
    //             'id_user' => Auth::user()->id_user,
    //             'nm_bpw' => request('nm_bpw'),
    //             'username' => request('username'),
    //             'password' => Hash::make(request('password')),
    //             'email' => request('email'),
    //             'alamat' => request('alamat'),
    //             'kabupaten' => request('kabupaten'),
    //             'no_telp' => request('no_telp'),
    //             'no_fax' => request('no_fax'),
    //             'nm_pic' => request('nm_pic'),
    //             'nm_pimpinan' => request('nm_pimpinan'),
    //             'jns_bpw' => request('jns_bpw'),
    //             'sts_kantor' => request('sts_kantor'),
    //             'nib' => request('nib'),
    //             'foto_bpw' => file_get_contents($request->file('foto_bpw')->getRealPath()),
    //             'status' => request('status'),
    //             ]);

    //     return redirect('/list_bpwAdmin');
    // }

    // public function detailBPWAdmin($id)
    // {
    //     $detailBPWAdmin = BPW::find($id);
    //     return view ('bpw/detail_bpwAdmin',['detailBPWAdmin' => $detailBPWAdmin]);
    // }


    // public function destroy($id)
    // {
        
    // }