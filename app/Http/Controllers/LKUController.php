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

    public function index2()
    {
        $lkus = LKU::all();
        return view('lku', compact('lkus'));
    }


    public function store(Request $request)
    {
        LKU::create([
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

        return redirect('/lku');
    }


    public function show($id)
    {
        $detailLKU = LKU::find($id);
        return view ('lku/detail_lku',['detailLKU' => $detailLKU]);
    }


    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $lku = LKU::find($id);
        return view ('lku/edit_lku', [
            'lku' => $tdup,
            'bpw' => $bpw
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