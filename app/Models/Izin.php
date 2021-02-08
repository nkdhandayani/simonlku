<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

	protected $table = "izin";
    public $timestamps = true;
    protected $primaryKey = "id_izin";
    protected $dates = ['ms_berlaku'];
    
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
        return $this->belongsTo(BPW::class, 'id_bpw', 'id_bpw');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function lku()
    {
        return $this->hasMany(LKU::class, 'id_lkU', 'id_lku');
    }
}