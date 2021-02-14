<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\BPW as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Izin extends Model
{
    use HasFactory;

	protected $table = "izin";
    public $timestamps = true;
    protected $primaryKey = "id_izin";
    protected $dates = ['tgl_izin', 'tgl_verifikasi', 'created_at', 'updated_at'];
    
    public $fillable = [
    	'id_bpw',
        'id_user',
        'no_izin',
        'tgl_izin',
        'file_izin',
        'sts_verifikasi',
        'keterangan',
        'tgl_verifikasi',
        'status',
        'created_at',
        'updated_at'
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