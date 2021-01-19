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
    protected $primaryKey = "id_tdup";

    public $fillable = [
    	'id_bpw',
        'no_tdup',
        'tanggal',
        'ms_berlaku',
        'file_tdup',
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
