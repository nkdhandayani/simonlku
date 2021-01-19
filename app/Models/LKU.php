<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKU extends Model
{
    use HasFactory;

    protected $table = "lku";
    public $fillable = [
    	'id_tdup',
    	'id_izin',
        'no_surat',
        'tahun',
        'periode',
        'file_lku',
        'sts_verifikasi',
        'keterangan',
        'tgl_verifikasi',
        'status',
    ];

    public function tdup()
    {
        return $this->belongsTo(TDUP::class);
    }

    public function izin()
    {
        return $this->belongsTo(Izin::class);
    }
}
