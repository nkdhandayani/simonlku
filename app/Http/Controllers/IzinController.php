<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use App\Models\Izin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $izins = Izin::all();
        return view('izin/index', compact('izins'));
    }


    public function create()
    {
        return view('izin/tambah_izin');
    }


    public function store(Request $request)
    {
        Izin::create([
            'no_izin' => request('no_izin'),
            'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
            'ms_berlaku' => request('ms_berlaku'),
            'file_izin' => '',
            'sts_verifikasi' => '',
            'keterangan' => '',
            'tgl_verifikasi' => '',
            'status' => '',
        ]);

        return redirect('izin/index');
    }


    public function show($id)
    {
        $detailIzin = Izin::find($id);
        return view ('izin/detail_izin', compact('izins'));
    }

    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $izins = Izin::find($id);
        return view ('izin/edit_izin', [
            'izin' => $izins,
            'bpw' => $bpw
        ]);
    }


    public function update(Request $request, $id)
    {
        $izins = Izin::find($id);

        $izins->noizinp = $request->no_izin;
        $izins->ms_berlaku = $request->ms_berlaku;
        $izins->file_izin = $request->file_izin;
        $izins->sts_verifikasi = $request->sts_verifikasi;
        $izins->keterangan = $request->keterangan;
        $izins->tgl_verifikasi = $request->tgl_verifikasi;
        $izins->status = $request->status;
        $izins->save();
        return redirect('izin/index');

        // DB::table('izin')->where('id_izin', $id)
        //     -> update([
        //         'no_izin' => request('no_izin'),
        //         'ms_berlaku' => request('ms_berlaku'),
        //         'file_izin' => file_get_contents($request->file('file_izin')->getRealPath()),
        //         'sts_verifikasi' => request('sts_verifikasi'),
        //         'keterangan' => request('keterangan'),
        //         'tgl_verifikasi' => request('tgl_verifikasi'),
        //         'status' => request('status'),
        //         ]);
    }


        public function destroy($id)
    {
        //
    }
}