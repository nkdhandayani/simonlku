<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LKU extends Model
{
    use HasFactory;

    protected $table = "lku";
    public $timestamps = true;
    protected $primaryKey = "id_lku";
    
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

    public function bpw()
    {
        return $this->belongsTo(BPW::class, 'id_bpw', 'id_bpw');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function tdup()
    {
        return $this->belongsTo(TDUP::class, 'id_tdup', 'id_tdup');
    }

    public function izin()
    {
        return $this->belongsTo(Izin::class, 'id_izin', 'id_izin');
    }
}
