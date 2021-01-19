<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

	protected $table = "izin";
    public $fillable = [
    	'id_bpw',
        'no_izin',
        'tanggal',
        'ms_berlaku',
        'file_izin',
        'sts_verifikasi',
        'keterangan',
        'tgl_verifikasi',
        'status',
    ];

    public function bpw()
    {
        return $this->belongsTo(BPW::class);
    }

    public function lku()
    {
        return $this->hasMany(LKU::class);
    }
}