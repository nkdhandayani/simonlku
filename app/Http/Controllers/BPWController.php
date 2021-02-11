<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PDF;

class BPWController extends Controller
{
    /* *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bpws = BPW::orderBy('nm_bpw', 'ASC')->get();
        return view('bpw/index', compact('bpws'));
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
            'status' => request('status'),
        ]);

        return redirect('/bpw')->with('success', 'Data berhasil ditambahkan!');
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
        $bpws->email = $request->email;
        $bpws->kabupaten = $request->kabupaten;
        $bpws->no_telp = $request->no_telp;
        $bpws->no_fax = $request->no_fax;
        $bpws->nm_pic = $request->nm_pic;
        $bpws->nm_pimpinan = $request->nm_pimpinan;
        $bpws->jns_bpw = $request->jns_bpw;
        $bpws->sts_kantor = $request->sts_kantor;
        $bpws->nib = $request->nib;
        $bpws->status = $request->status;
        $bpws->save();

        return redirect('/bpw')->with('success', 'Data berhasil dirubah!');
    }
    
    public function pdf(Request $request)
    {
        $bpws = BPW::all();
 
        $pdf = PDF::loadview('bpw/bpw_pdf', compact('bpws'));
        return $pdf->stream();
    }

    public function destroy($id)
    {
        //
    }
}