<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function showUser()
    {
        //$user = User::find($id);
        return view ('/profile/index');
    }

    public function showBPW()
    {
        //$BPW = BPW::find($id);
        return view ('/profile/edit_profile');
    }

    public function indexPass()
    {
        //$BPW = BPW::find($id);
        return view ('/profile/ganti_pass');
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
