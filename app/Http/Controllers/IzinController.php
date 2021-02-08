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
        // $izins = Izin::all();
        $izins = Izin::orderByRaw('FIELD(sts_verifikasi,0,1,2)')->latest()->get();

        if(auth()->guard('bpw')->user()) {
            $bpw = auth()->guard('bpw')->user();
            $izins = Izin::where('id_bpw', $bpw->id_bpw)->orderByRaw('FIELD(sts_verifikasi,0,1,2)')->latest()->get();
        }        
        return view('izin/index', compact('izins'));
    }

    
    public function store(Request $request)
    {
        $file = $request->file_izin;
        // dd($request->all());

        $file->move('file_izin', $file->getClientOriginalName());

        Izin::create([
            'no_izin' => request('no_izin'),
            'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
            'tanggal' => request('tanggal'),
            'ms_berlaku' => request('ms_berlaku'),
            'file_izin' => $file->getClientOriginalName(),
            'sts_verifikasi' => '',
            'keterangan' => '',
            'tgl_verifikasi' => '',
            'status' => '',
        ]);

        return redirect('/izin');
    }


    public function show($id)
    {
        $user = User::all();
        $bpw = BPW::all();
        $izins = Izin::find($id);
        return view ('/izin/detail_izin', compact('izins', 'bpw', 'user'));
    }

    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $user = Auth::guard('user')->user();
        $izins = Izin::find($id);
        return view ('izin/edit_izin', [
            'izin' => $izins,
            'bpw' => $bpw,
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $izins = Izin::find($id);

        if(auth()->guard('user')->user()) {
            $id_user = auth()->user()->id_user;
            $izins->id_user = $id_user;
        }
        $izins->no_izin = $request->no_izin;
        $izins->ms_berlaku = $request->ms_berlaku;
        if(auth()->guard('bpw')->user()) {
            $file = $request->file_izin;

            $file->move('file_izin', $file->getClientOriginalName());

            $izins->file_izin = $file->getClientOriginalName();
        }
        $izins->sts_verifikasi = $request->sts_verifikasi;
        $izins->keterangan = $request->keterangan;
        $izins->tgl_verifikasi = $request->tgl_verifikasi;
        $izins->status = $request->status;
        $izins->save();
        return redirect('/izin');
    }


        public function destroy($id)
    {
        //
    }
}