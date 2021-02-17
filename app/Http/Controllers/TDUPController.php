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
        // $tdups = TDUP::all();
        $tdups = TDUP::orderByRaw('FIELD(sts_verifikasi,0,1,2)')->latest()->get();

        if(auth()->guard('bpw')->user()) {
            $bpw = auth()->guard('bpw')->user();
            $tdups = TDUP::where('id_bpw', $bpw->id_bpw)->orderByRaw('FIELD(sts_verifikasi,0,1,2)')->latest()->get();
        }        
        return view('tdup/index', compact('tdups'));
    }

 
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_tdup' => 'required|min:4',
            'tgl_tdup' => 'required|date',
            'file_tdup' => 'required|mimes:jpg,jpeg,png'
        ]);

        $file = $request->file_tdup;
        // dd($request->all());

        $file->move('file_tdup', $file->getClientOriginalName());

        TDUP::create([
            'no_tdup' => request('no_tdup'),
            'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
            'id_user' => '',
            'tgl_tdup' => request('tgl_tdup'),
            'file_tdup' => $file->getClientOriginalName(),
            'sts_verifikasi' =>'',
            'keterangan' => request('keterangan'),
            'tgl_verifikasi' => request('tgl_verifikasi'),
        ]);

        return redirect('/tdup')->with('success', 'Data berhasil ditambahkan!');
    }


    public function show($id)
    {
        $user = User::all();
        $bpw = BPW::all();
        $tdups = TDUP::find($id);
        return view ('/tdup/detail_tdup', compact('tdups', 'bpw', 'user'));
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
        $this->validate($request, [
            'no_tdup' => 'required|min:4',
            'tgl_tdup' => 'required|date',
            'file_tdup' => 'mimes:jpg,jpeg,png'
        ]);

        $tdups = TDUP::find($id);

        if(auth()->guard('user')->user()) {
            $id_user = auth()->user()->id_user;
            $tdups->id_user = $id_user;
        }
        
        $tdups->no_tdup = $request->no_tdup;
        $tdups->tgl_tdup = $request->tgl_tdup;
        if(auth()->guard('bpw')->user()) {
            $file = $request->file_tdup;

            $file->move('file_tdup', $file->getClientOriginalName());

            $tdups->file_tdup = $file->getClientOriginalName();
        }
        $tdups->sts_verifikasi = $request->sts_verifikasi;
        $tdups->keterangan = $request->keterangan;
        $tdups->tgl_verifikasi = $request->tgl_verifikasi;
        $tdups->save();
        return redirect('/tdup')->with('success', 'Data berhasil dirubah!');  

    }


    public function destroy($id)
    {
        //
    }
}