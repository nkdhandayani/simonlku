<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\BPW as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TDUP extends Model
{
    use HasFactory;

    protected $table = "tdup";
    public $timestamps = true;
    protected $primaryKey = "id_tdup";
    protected $dates = ['tanggal', 'tgl_verifikasi'];

    public $fillable = [
    	'id_bpw',
        'id_user',
        'no_tdup',
        'tanggal',
        'file_tdup',
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
        return $this->hasMany(LKU::class, 'id_lku', 'id_lku');
    }
}
