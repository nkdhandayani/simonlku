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
        $this->validate($request, [
            'nm_bpw' => 'required|min:6|max:50',
            'username' => 'required|min:5|max:20|unique:bpw',
            'password' => 'required|min:6|max:20',
            'kabupaten' => 'required',
            'no_telp' => 'required|min:7|max:15',
            'no_fax' => 'nullable|min:7|max:15',    
            'nm_pic' => 'required|min:6|max:50',
            'nm_pimpinan' => 'required|min:6|max:50',
            'jns_bpw' => 'required',
            'sts_kantor' => 'required',
            'nib' => 'required|min:13|max:20',
            'foto_bpw' => 'mimesmimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

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
        $this->validate($request, [
            'nm_bpw' => 'min:6|max:50',
            'username' => 'min:5|max:20|unique:bpw,username,'.$id.',id_bpw',
            'no_telp' => 'min:7|max:15',
            'no_fax' => 'nullable|min:7|max:15',    
            'nm_pic' => 'min:6|max:50',
            'nm_pimpinan' => 'min:6|max:50',
            'nib' => 'min:13|max:20',
            'foto_bpw' => 'mimes:jpg,jpeg,png'
        ]);

        $bpws = BPW::where('id_bpw', $id)->first();

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
        if($request->hasFile('foto_bpw')){
            if(auth()->guard('bpw')->user()) {
                $file = $request->foto_bpw;

                $file->move('avatar_bpw', $file->getClientOriginalName());

                $bpws->foto_bpw = $file->getClientOriginalName();
            }
        }
        $bpws->status = $request->status;
        $bpws->save();

        return redirect('/bpw')->with('success', 'Data berhasil dirubah!');
    }
    
    public function cetak(Request $request)
    {
        $bpws = BPW::orderBy('nm_bpw', 'ASC')->where('status', 1)->get();
 
        $pdf = PDF::loadview('bpw/bpw_cetak', compact('bpws'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function cetakId($id)
    {
        $bpws = BPW::find($id);
 
        $pdf = PDF::loadview('bpw/bpw_cetakId', compact('bpws'));
        return $pdf->stream();
    }
}