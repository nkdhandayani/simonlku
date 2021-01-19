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
        return view('tdup.tambah_tdupBPW');
    }
    public function indexDashAdmin()
    {
        return view('layout.dashboard_admin');
    }
    public function indexDashStaf()
    {
        return view('layout.dashboard_staf');
    }
    public function indexDashBPW()
    {
        return view('layout.dashboard_bpw');
    }


    public function listBPW()
    {
        $tdups = TDUP::all();
        return view('tdup/list_tdupBPW', compact('tdups'));
    }

    public function listAdmin()
    {
        $tdups = TDUP::all();
        return view('tdup/list_tdupAdmin', compact('tdups'));
    }
    public function listStaf()
    {
        $tdups = TDUP::all();
        return view('tdup/list_tdupStaf', compact('tdups'));
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
        TDUP::create([
            'no_tdup' => request('no_tdup'),
            'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
            'ms_berlaku' => request('ms_berlaku'),
            'file_tdup' => request('file_tdup'),
            'sts_verifikasi' => '',
            'keterangan' => '',
            'tgl_verifikasi' => '',
            'status' => '',
        ]);

        return redirect('/list_tdupBPW');
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
        $bpw = Auth::guard('bpw')->user();
        $tdup = TDUP::find($id);
        return view ('tdup/edit_tdupBPW', [
            'tdup' => $tdup,
            'bpw' => $bpw
        ]);
    }

    public function editTDUPProsesBPW (Request $request, $id)
    {
        DB::table('tdup')->where('id_tdup', $id)
            -> update([
                'id_bpw' => auth()->id_bpw(),
                'no_tdup' => request('no_tdup'),
                'ms_berlaku' => request('ms_berlaku'),
                'file_tdup' => request('file_tdup'),
                'sts_verifikasi' => request('sts_verifikasi'),
                'keterangan' => request('keterangan'),
                'tgl_verifikasi' => request('tgl_verifikasi'),
                'status' => request('status'),
            ]);
        return redirect('/list_tdupBPW');
    }

    public function editTDUPProsesStaf (Request $request, $id)
    {
        DB::table('tdup')->where('id_tdup', $id)
            -> update([
                'id_bpw' => auth()->id_bpw(),
                'no_tdup' => request('no_tdup'),
                'ms_berlaku' => request('ms_berlaku'),
                'file_tdup' => request('file_tdup'),
                'sts_verifikasi' => request('sts_verifikasi'),
                'keterangan' => request('keterangan'),
                'tgl_verifikasi' => request('tgl_verifikasi'),
                'status' => request('status'),
            ]);
        return redirect('/list_tdupStaf');
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

    public function detailTDUPBPW($id)
    {
        $detailTDUPBPW = TDUP::find($id);
        return view ('tdup/detail_tdupBPW',['detailTDUPBPW' => $detailTDUPBPW]);
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
