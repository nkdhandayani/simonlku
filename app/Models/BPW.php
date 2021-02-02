<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BPW extends Authenticatable
{
    use HasFactory;

    protected $table = "bpw";
    public $timestamps = true;
    protected $primaryKey = "id_bpw";

    public $fillable = [
    	'id_user',
    	'nm_bpw',
        'username',
        'password',
        'email',
        'alamat',
        'kabupaten',
        'no_telp',
        'no_fax',
        'nm_pic',
        'nm_pimpinan',
        'jns_bpw',
        'sts_kantor',
        'nib',
        'foto_bpw',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function tdup()
    {
        return $this->hasMany(TDUP::class, 'id_tdup', 'id_tdup');
    }

    public function izin()
    {
        return $this->hasMany(Izin::class, 'id_izin', 'id_izin');
    }

    public function lku()
    {
        return $this->hasMany(LKU::class, 'id_lku', 'id_lku');
    }
}
