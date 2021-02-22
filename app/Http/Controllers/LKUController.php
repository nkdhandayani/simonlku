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
use PDF; 

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

    public function monitoring(Request $request)
    { 
        $bpws = BPW::orderBy('nm_bpw', 'ASC')->get();
        $lkus = LKU::orderBy('tahun', 'ASC')->groupBy('tahun')->pluck('tahun');

        if($request->ajax()){
            $lku = LKU::where('tahun', $request->tahun)->pluck('id_bpw')->toArray();
            $data = BPW::whereNotIn('id_bpw', collect($lku))->orderBy('nm_bpw', 'ASC')->get();
            $user = auth()->guard('user')->user();
            return json_encode(['data'=>$data, 'user'=>$user]);
        }
        return view('lku/monitoring_lku', compact('bpws', 'lkus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_surat' => 'required|min:4|max:50',
            'tahun' => 'required|min:4|max:4',
            'periode' => 'required',
            'file_lku' => 'required|mimes:pdf'
        ]);

        $bpw = auth()->guard('bpw')->user();
        // dd($bpw->id_bpw);
        $tdup = TDUP::where('id_bpw', $bpw->id_bpw)->where('sts_verifikasi', 2)->first();

        $izin = Izin::where('id_bpw', $bpw->id_bpw)->where('sts_verifikasi', 2)->first();

        if($tdup == null && $izin == null) {
            return redirect('/lku')->with('error', 'Pastikan file TDUP dan Izin Operasional Anda telah disetujui.');
        } else if($tdup == null) {
            return redirect('/lku')->with('error', 'Pastikan file TDUP Anda telah disetujui.');
        } else if($izin == null) {
            return redirect('/lku')->with('error', 'Pastikan file Izin Operasional Anda telah disetujui.');
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
            'sts_verifikasi' =>'',
            'keterangan' => request('keterangan'),
            'tgl_verifikasi' => request('tgl_verifikasi'),
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
        if(auth()->guard('bpw')->user()) {
        $this->validate($request, [
            'no_surat' => 'min:4|max:50',
            'tahun' => 'min:4|max:4',
            'file_lku' => 'mimes:pdf'
        ]);
        } else {
        $this->validate($request, [
            'sts_verifikasi' => 'required'
        ]);
        }
        
        $lkus = LKU::find($id);

        if(auth()->guard('user')->user()) {
            $id_user = auth()->user()->id_user;
            $lkus->id_user = $id_user;
        }
        
        $lkus->no_surat = $request->no_surat;
        $lkus->tahun = $request->tahun;
        $lkus->periode = $request->periode;

        if($request->hasFile('file_lku')){
            if(auth()->guard('bpw')->user()) {
                $file = $request->file_lku;

                $file->move('file_lku', $file->getClientOriginalName());

                $lkus->file_lku = $file->getClientOriginalName();
            }
        }

        if(auth()->guard('bpw')->user()){
            $lkus->sts_verifikasi = $request->sts_verifikasi == 0;
        } else{
            $lkus->sts_verifikasi = $request->sts_verifikasi;
        }
        $lkus->keterangan = $request->keterangan;
        $lkus->tgl_verifikasi = $request->tgl_verifikasi;
        $lkus->save();
        return redirect('/lku');
    }

    public function cetakFilter(Request $request,$tahun)
    {   
        $lku = LKU::where('tahun', $tahun)->pluck('id_bpw')->toArray();
        $bpw = BPW::whereNotIn('id_bpw', collect($lku))->get();
        $tahun_filter = LKU::where('tahun', $tahun)->first();

        $pdf = PDF::loadview('lku/lku_cetak', compact('lku','bpw', 'tahun'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}