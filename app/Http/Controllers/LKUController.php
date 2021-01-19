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
        return view('lku.tambah_lkuBPW');
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
        $lkus = LKU::all();
        return view('lku/list_lkuBPW', compact('lkus'));
    }

    public function listAdmin()
    {
        $lkus = LKU::all();
        return view('lku/list_lkuAdmin', compact('lkus'));
    }
    public function listStaf()
    {
        $lkus = LKU::all();
        return view('lku/list_lkuStaf', compact('lkus'));
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
        LKU::create([
            'id_tdup' => auth()->id_tdup(),
            'id_izin' => auth()->id_izin(),
            'no_surat' => request('no_surat'),
            'tahun' => request('tahun'),
            'periode' => request('periode'),
            'file_lku' => request('file_lku'),
            'sts_verifikasi' => request('sts_verifikasi'),
            'keterangan' => request('keterangan'),
            'tgl_verifikasi' => request('tgl_verifikasi'),
            'status' => request('status'),
        ]);

        return redirect('/list_lkuBPW');
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
        $lku = LKU::find($id);
        return view ('lku/edit_lkuBPW', compact('lku'));
    }

    public function editLKUProsesBPW (Request $request, $id)
    {
        DB::table('lku')->where('id_lku', $id)
            -> update([
                'id_tdup' => auth()->id_tdup(),
                'id_izin' => auth()->id_izin(),
                'no_surat' => request('no_surat'),
                'tahun' => request('tahun'),
                'periode' => request('periode'),
                'file_lku' => request('file_lku'),
                'sts_verifikasi' => request('sts_verifikasi'),
                'keterangan' => request('keterangan'),
                'tgl_verifikasi' => request('tgl_verifikasi'),
                'status' => request('status'),
            ]);
        return redirect('/list_lkuBPW');
    }

    public function editLKUProsesStaf (Request $request, $id)
    {
        DB::table('lku')->where('id_lku', $id)
            -> update([
                'id_tdup' => auth()->id_tdup(),
                'id_izin' => auth()->id_izin(),
                'no_surat' => request('no_surat'),
                'tahun' => request('tahun'),
                'periode' => request('periode'),
                'file_lku' => request('file_lku'),
                'sts_verifikasi' => request('sts_verifikasi'),
                'keterangan' => request('keterangan'),
                'tgl_verifikasi' => request('tgl_verifikasi'),
                'status' => request('status'),
                ]);
        return redirect('/list_lkuStaf');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
