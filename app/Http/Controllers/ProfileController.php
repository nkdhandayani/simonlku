<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index()
    {
        $bpws = Auth::guard('bpw')->user();
        $users = Auth::guard('user')->user();
        return view ('/profile/index', compact('bpws','users'));
    }


    public function edit()
    {
        $bpws = Auth::guard('bpw')->user();
        $users = Auth::guard('user')->user();
        return view('profile/edit_profile', compact('bpws', 'users'));
    }


    public function update(Request $request)
    {
        if(auth()->guard('user')->user())
        {
            $this->validate($request, [
                'nm_user' => 'min:6|max:50',
                'password' => 'min:6|max:20', 
                'nik' => 'min:16|max:20', 
                'no_telp' => 'min:7|max:15',
                'foto_user' => 'nullable|mimes:jpg,jpeg,png'   
            ]);
            
                $users = Auth::guard('user')->user();
    
                $users->nm_user = $request->nm_user;
                $users->nik = $request->nik;
                $users->email = $request->email;
                $users->no_telp = $request->no_telp;
                $users->jns_kelamin = $request->jns_kelamin;
                if($request->hasFile('foto_user')){
                    if(auth()->guard('user')->user()) {
                        $file = $request->foto_user;
    
                        $file->move('avatar_user', $file->getClientOriginalName());
    
                        $users->foto_user = $file->getClientOriginalName();
                    }
                }
                $users->save();
                return redirect('/profile')->with('success', 'Data berhasil dirubah!');
        }
        elseif (auth()->guard('bpw')->user())
        {
            $this->validate($request, [
                'nm_bpw' => 'min:6|max:50',
                'no_telp' => 'min:7|max:15',
                'no_fax' => 'nullable|min:7|max:15',    
                'nm_pic' => 'min:6|max:50',
                'nm_pimpinan' => 'min:6|max:50',
                'nib' => 'min:13|max:20',
                'foto_bpw' => 'nullable|mimes:jpg,jpeg,png'
            ]);

                $bpws = Auth::guard('bpw')->user();

                $bpws->nm_bpw = $request->nm_bpw;
                $bpws->email = $request->email;
                $bpws->kabupaten = $request->kabupaten;
                $bpws->no_telp = $request->no_telp;
                $bpws->no_fax = $request->no_fax;
                $bpws->nm_pic = $request->nm_pic;
                $bpws->nm_pimpinan = $request->nm_pimpinan;
                $bpws->jns_bpw = $request->jns_bpw;
                $bpws->sts_kantor = $request->sts_kantor;
                $bpws->nib = $request->nib;
                if($request->hasFile('foto_bpw')){
                    if(auth()->guard('bpw')->user()) {
                        $file = $request->foto_bpw;
    
                        $file->move('avatar_bpw', $file->getClientOriginalName());
    
                        $bpws->foto_bpw = $file->getClientOriginalName();
                    }
                }
                $bpws->save();
                return redirect('/profile')->with('success', 'Data berhasil dirubah!');
        }
    }

    public function gantiPass()
    {
        $bpws = Auth::guard('bpw')->user();
        $users = Auth::guard('user')->user();
        return view ('/profile/ganti_pass', compact('bpws','users'));
    }

    public function gantiPassStore(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required|min:6|max:20',
            'password_baru' => 'required|min:6|max:20',
            'password_konfirmasi' => 'required|min:6|max:20',
        ]);

        $u = (Auth::guard('bpw')->user() != null) ? Auth::guard('bpw')->user() : Auth::guard('user')->user();
        
        // dd($request->all());
        if (Hash::check($request->password_lama, $u->password)) {
            // Password lama yang diinputkan sama dengan password saat ini
            if ($request->password_baru === $request->password_konfirmasi) {
                // Password baru dan password konfirmasi cocok
                $password_baru = bcrypt($request->password_baru);
                $password_konfirmasi = bcrypt($request->password_konfirmasi);

                $update_password = $u->update([
                    'password' => $password_baru
                ]);

                return redirect('/profile')->with('success', 'Password telah berhasil diubah.');
            } else {
                // Jika password baru dan password konfirmasi tidak sama maka kembalikan ke halaman ganti password dengan error 
                return redirect('/profile/ganti_pass')->with('error', 'Password baru dan password konfirmasi yang Anda masukkan tidak sama, silahkan coba lagi.');
            }
        } else {
            // Jika password lama yang diinputkan tidak cocok dengan password saat ini, maka kembalikan ke halaman ganti password dengan error 
            return redirect('/profile/ganti_pass')->with('error', 'Password lama yang Anda masukkan tidak sama, silahkan coba lagi.');
        }
    }
}
