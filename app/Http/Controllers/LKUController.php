<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use App\Models\TDUP;
use App\Models\Izin;
use App\Models\LKU;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LKUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $lkus = LKU::orderByRaw('FIELD(sts_verifikasi,0,1,2)')->latest()->get();

        if(auth()->guard('bpw')->user()) {
            $bpw = auth()->guard('bpw')->user();
            $lkus = LKU::where('id_bpw', $bpw->id_bpw)->orderByRaw('FIELD(sts_verifikasi,0,1,2)')->latest()->get();
        }        
        return view('lku/index', compact('lkus'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'tahun' => 'required|min:4|max:4',
            'file_lku' => 'required|mimes:pdf'
        ]);

        $bpw = auth()->guard('bpw')->user();
        // dd($bpw->id_bpw);
        $tdup = TDUP::where('id_bpw', $bpw->id_bpw)
            ->where('status', 1)
            ->where('sts_verifikasi', 2)
            ->latest()
            ->first();

        $izin = Izin::where('id_bpw', $bpw->id_bpw)
            ->where('status', 1)
            ->where('sts_verifikasi', 2)
            ->latest()
            ->first();

        if($tdup == null && $izin == null) {
            return redirect('/lku')->with('error', 'TDUP dan Izin tidak ada');
        } else if($tdup == null) {
            return redirect('/lku')->with('error', 'TDUP tidak ada');
        } else if($izin == null) {
            return redirect('/lku')->with('error', 'Izin tidak ada');
        }

        $file = $request->file_lku;
        // dd($request->all());

        $file->move('file_lku', $file->getClientOriginalName());

        LKU::create([
            'id_tdup' => $tdup->id_tdup,
            'id_izin' => $izin->id_izin,
            'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
            'no_surat' => request('no_surat'),
            'tahun' => request('tahun'),
            'periode' => request('periode'),
            'file_lku' => $file->getClientOriginalName(),
            'sts_verifikasi' => '',
            'keterangan' => '',
            'tgl_verifikasi' => '',
            'status' => '',
        ]);

        return redirect('/lku');
    }


    public function show($id)
    {
        $user = User::all();
        $bpw = BPW::all();
        $lkus = LKU::find($id);
        $tdups = TDUP::find($id);
        $izins = Izin::find($id);
        return view ('/lku/detail_lku', compact('lkus','tdups','izins', 'bpw', 'user'));
    }


    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $user = Auth::guard('user')->user();
        $lkus = LKU::find($id);
        $tdups = TDUP::find($id);
        $izins = Izin::find($id);
        return view ('lku/edit_lku', [
            'lku' => $lkus,
            'tdup' => $tdups,
            'izin' => $izins,
            'bpw' => $bpw,
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tahun' => 'required|min:4|max:4',
            'file_lku' => 'required|mimes:pdf'
        ]);
        
        $lkus = LKU::find($id);

        if(auth()->guard('user')->user()) {
            $id_user = auth()->user()->id_user;
            $lkus->id_user = $id_user;
        }
        
        $lkus->no_surat = $request->no_surat;
        $lkus->tahun = $request->tahun;
        $lkus->periode = $request->periode;
        if(auth()->guard('bpw')->user()) {
            $file = $request->file_lku;

            $file->move('file_lku', $file->getClientOriginalName());

            $lkus->file_lku = $file->getClientOriginalName();
        }
        $lkus->sts_verifikasi = $request->sts_verifikasi;
        $lkus->keterangan = $request->keterangan;
        $lkus->tgl_verifikasi = $request->tgl_verifikasi;
        $lkus->status = $request->status;
        $lkus->save();
        return redirect('/lku');
    }


    public function destroy($id)
    {
        //
    }
}