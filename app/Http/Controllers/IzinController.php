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
        return view('izin/list_izinBPW', compact('izins'));
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
            'file_izin' => file_get_contents($request->file('file_izin')->getRealPath()),
            'sts_verifikasi' => request('sts_verifikasi'),
            'keterangan' => request('keterangan'),
            'tgl_verifikasi' => request('tgl_verifikasi'),
            'status' => request('status'),
        ]);

        return redirect('izin/index');
    }


    public function show($id)
    {
        $detailIzin = Izin::find($id);
        return view ('izin/detail_izin',['detailIzin' => $detailIzin]);
    }

    public function edit($id)
    {
        $bpw = Auth::guard('bpw')->user();
        $izin = Izin::find($id);
        return view ('izin/edit_izin', [
            'izin' => $tdup,
            'bpw' => $bpw
        ]);
    }


    public function update(Request $request, $id)
    {
        DB::table('izin')->where('id_izin', $id)
            -> update([
                'no_izin' => request('no_izin'),
                'ms_berlaku' => request('ms_berlaku'),
                'file_izin' => file_get_contents($request->file('file_izin')->getRealPath()),
                'sts_verifikasi' => request('sts_verifikasi'),
                'keterangan' => request('keterangan'),
                'tgl_verifikasi' => request('tgl_verifikasi'),
                'status' => request('status'),
                ]);
        return redirect('izin/index');
    }


        public function destroy($id)
    {
        //
    }
}

    


//     public function indexDashAdmin()
//     {
//         return view('layout.dashboard_admin');
//     }
//     public function indexDashStaf()
//     {
//         return view('layout.dashboard_staf');
//     }
//     public function indexDashBPW()
//     {
//         return view('layout.dashboard_bpw');
//     }


//     public function listBPW()
//     {
//         $izins = Izin::all();
//         return view('izin/list_izinBPW', compact('izins'));
//     }

//     public function listAdmin()
//     {
//         $izins = Izin::all();
//         return view('izin/list_izinAdmin', compact('izins'));
//     }
//     public function listStaf()
//     {
//         $izins = Izin::all();
//         return view('izin/list_izinStaf', compact('izins'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         Izin::create([
//             'no_izin' => request('no_izin'),
//             'id_bpw' => Auth::guard('bpw')->user()->id_bpw,
//             'ms_berlaku' => request('ms_berlaku'),
//             'file_izin' => request('file_izin'),
//             'sts_verifikasi' => request('sts_verifikasi'),
//             'keterangan' => request('keterangan'),
//             'tgl_verifikasi' => request('tgl_verifikasi'),
//             'status' => request('status'),
//         ]);

//         return redirect('/list_izinBPW');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $izin = Izin::find($id);
//         return view ('izin/edit_izinBPW', compact('izin'));
//     }

//     public function editIzinProsesBPW (Request $request, $id)
//     {
//         DB::table('izin')->where('id_izin', $id)
//             -> update([
//                 'no_izin' => request('no_izin'),
//                 'ms_berlaku' => request('ms_berlaku'),
//                 'file_izin' => request('file_izin'),
//                 'sts_verifikasi' => request('sts_verifikasi'),
//                 'keterangan' => request('keterangan'),
//                 'tgl_verifikasi' => request('tgl_verifikasi'),
//                 'status' => request('status'),
//                 ]);
//         return redirect('/list_bpwBPW');
//     }

//     public function editIzinProsesStaf (Request $request, $id)
//     {
//         DB::table('izin')->where('id_izin', $id)
//             -> update([
//                 'no_izin' => request('no_izin'),
//                 'ms_berlaku' => request('ms_berlaku'),
//                 'file_izin' => request('file_izin'),
//                 'sts_verifikasi' => request('sts_verifikasi'),
//                 'keterangan' => request('keterangan'),
//                 'tgl_verifikasi' => request('tgl_verifikasi'),
//                 'status' => request('status'),
//                 ]);
//         return redirect('/list_bpwStaf');
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
