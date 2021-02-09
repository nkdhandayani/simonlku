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
    	// dd(auth()->guard('bpw')->user());
    	if(auth()->guard('bpw')->user()) {
    		$year = [
    			// ?
    			2021, 2022, 2023
    		];
	    	$yearInactive = 0;
	    	$allowLogin = true;
	    	$total_lku = 0;

	    	foreach($year as $item) {
	    		$periode1 = ($item) .date('-07-31'); 
	    		$periode2 = ($item + 1) .date('-01-31'); 

	    		if(Carbon::now()->lt($periode1)) {
	    			$lku = LKU::where('id_bpw', auth()->guard('bpw')->user()->id_bpw)
	    			->where('tahun', $item)
	    			->where('created_at', '>=', $periode1)
	    			->where('created_at', '<=', $periode2)
	    			->count();
	    			// dd($lku);
	    		} else {
	    			$lku = LKU::where('id_bpw', auth()->guard('bpw')->user()->id_bpw)
	    			->where('tahun', $item)
	    			->where('created_at', '>=', $periode2)
	    			->count();
	    			// dd($lku);
	    		}
	    		
	    		$total_lku += ($lku > 0) ? $lku : 0; 

	    		if(($total_lku < 1 && Carbon::now()->gte($periode2))) {
	    			$allowLogin = false;
	    			$yearInactive = $item;
	    			break;
	    		}
	    	}

	    	if(!$allowLogin) {
	    		return redirect('user-logout')->with('error', 'Anda tidak dapat login karena tidak mengupload file LKU sebanyak 2 kali berturut-turut pada tahun ' . $yearInactive);
	    	}
    	}

    	$jml_bpw = BPW::count();
    	$jml_tdup = TDUP::count();
    	$jml_izin = Izin::count();
    	$jml_lku = LKU::count();
        
    	return view('dashboard.index', compact('jml_bpw','jml_tdup','jml_izin','jml_lku'));
    }
}
