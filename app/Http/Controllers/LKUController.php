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
        $lkus = LKU::all();
        return view('lku/index', compact('lkus'));
    }


    public function store(Request $request)
    {
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
            'id_tdup' => $tdup,
            'id_izin' => $izin,
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
        return view ('/izin/detail_izin', compact('lkus','tdups','izins', 'bpw', 'user'));
    }


    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $user = Auth::guard('user')->user();
        $lkus = LKU::find($id);
        $tdups = TDUP::find($id);
        $izins = Izin::find($id);
        return view ('izin/edit_izin', [
            'lku' => $lkus,
            'tdup' => $tdups,
            'izin' => $izins,
            'bpw' => $bpw,
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        DB::table('lku')->where('id_lku', $id)
            -> update([
                'id_tdup' => auth()->id_tdup(),
                'id_izin' => auth()->id_izin(),
                'no_surat' => request('no_surat'),
                'tahun' => request('tahun'),
                'periode' => request('periode'),
                'file_lku' => file_get_contents($request->file('file_lku')->getRealPath()),
                'sts_verifikasi' => request('sts_verifikasi'),
                'keterangan' => request('keterangan'),
                'tgl_verifikasi' => request('tgl_verifikasi'),
                'status' => request('status'),
            ]);
        return redirect('lku');
    }


    public function destroy($id)
    {
        //
    }
}