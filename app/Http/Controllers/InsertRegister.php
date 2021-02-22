<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InsertRegister extends Controller
{
    public function insert()
    {
        User::create([
            'username' => "admin",
            'password' => Hash::make("adminjasa"),
            'nm_user' => "Ngurah Adi Hendrawan",
            'nik' => "5671025310980001",
            'email' => "ngurahadi@gmail.com",
            'no_telp' => "089788566123",
            'jns_kelamin' => "Laki-laki",
            'foto_user'=> "",
            'level' => 0,
            'status' => 1,
            'created_at',
            'updated_at'
        ]);

        User::create([
            'username' => "stafjasa",
            'password' => Hash::make("stafjasa"),
            'nm_user' => "Wayan Darma Susila",
            'nik' => "5671025310980002",
            'email' => "wayandarma@gmail.com",
            'no_telp' => "0897885454231",
            'jns_kelamin' => "Laki-laki",
            'foto_user'=> "",
            'level' => 1,
            'status' => 1,
            'created_at',
            'updated_at'
        ]);
    }
}
