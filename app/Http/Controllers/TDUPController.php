<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use App\Models\TDUP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
 
class TDUPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdups = TDUP::all();
        return view('tdup/index', compact('tdups'));
    }


    public function store(Request $request)
    {
        TDUP::create([
            'no_tdup' => request('no_tdup'),
            'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
            'ms_berlaku' => request('ms_berlaku'),
            'file_tdup' => '',
            'sts_verifikasi' => '',
            'keterangan' => '',
            'tgl_verifikasi' => '',
            'status' => '',
        ]);

        return redirect('/tdup');
    }


    public function show($id)
    {
        $user = User::all();
        $bpw = BPW::all();
        $tdups = TDUP::find($id);
        return view ('tdup/detail_tdup', compact('tdups', 'bpw', 'user'));
    }


    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $user = Auth::guard('user')->user();
        $tdups = TDUP::find($id);
        return view ('tdup/edit_tdup', [
            'tdup' => $tdups,
            'bpw' => $bpw,
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    { 
        $tdups = TDUP::find($id);

        $tdups->no_tdup = $request->no_tdup;
        $tdups->ms_berlaku = $request->ms_berlaku;
        $tdups->file_tdup = $request->file_tdup;
        $tdups->sts_verifikasi = $request->sts_verifikasi;
        $tdups->keterangan = $request->keterangan;
        $tdups->tgl_verifikasi = $request->tgl_verifikasi;
        $tdups->status = $request->status;
        $tdups->save();
        return redirect('/tdup');
        

    }


    public function destroy($id)
    {
        //
    }
}