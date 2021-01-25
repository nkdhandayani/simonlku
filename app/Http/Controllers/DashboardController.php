<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BPW;
use App\Models\TDUP;
use App\Models\Izin;
use App\Models\LKU;

class DashboardController extends Controller
{
    public function index()
    {
    	$total_bpw = BPW::count();
    	$total_tdup = TDUP::count();
    	$total_izin = Izin::count();
    	$total_lku = LKU::count();
        
    	return view('dashboard.index', compact('total_bpw','total_tdup','total_izin','total_lku'));
    }
}
