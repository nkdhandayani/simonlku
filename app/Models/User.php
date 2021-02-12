<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyUsername;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users"; 
    public $timestamps = true;
    protected $primaryKey = 'id_user';
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'nm_user',
        'nik',
        'email',
        'no_telp',
        'jns_kelamin',
        'foto_user',
        'level',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bpw()
    {
        return $this->hasMany(BPW::class, 'id_bpw', 'id_bpw');
    }

    public function tdup()
    {
        return $this->hasMany(TDUP::class, 'id_btdup', 'id_tdup');
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
