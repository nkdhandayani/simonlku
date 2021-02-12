<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BPW;
use App\Models\TDUP;
use App\Models\Izin;
use App\Models\LKU;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
    	$bpw_nonaktif = BPW::all()->where('status', 0)->count();
    	$tdup_verif = TDUP::all()->where('sts_verifikasi', 0)->count();
    	$izin_verif = Izin::all()->where('sts_verifikasi', 0)->count();
    	$lku_verif = LKU::all()->where('sts_verifikasi', 0)->count();
        
    	return view('dashboard.index', compact('bpw_nonaktif', 'tdup_verif', 'izin_verif', 'lku_verif'));
    }
}
