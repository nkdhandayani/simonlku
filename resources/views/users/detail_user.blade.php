@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Detail Pengguna
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="/user"> Kelola Pengguna</a></li>
        <li class="active"><a href="#"> Detail Pengguna</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div>
                        <a href="/user" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center" style="padding: 20px;">
                                    @if(\Auth::guard('user')->user())
                                        @if($users->foto_user != null)
                                        <a href="{{ asset('avatar_user/' . $users->foto_user) }}"><img width="180px" height="180px" src="{{ asset('avatar_user/' . $users->foto_user) }}" class="img-circle" alt="User Image"/></a>
                                        @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="180px" height="180px" class="img-circle" alt="User Image" style="padding-top: 10px;"/>
                                        @endif
                                    @endif
                                    <div class="mt-3">
                                        <h3>
                                            {{$users->nm_user}}
                                        </h3>
                                        <p class="text-muted font-size-sm">
                                            <?php
                                            if($users->level == 0) { echo "Administrator"; } elseif($users->level == 1) { echo "Staf Jasa Pariwisata"; } elseif($users->level == 2) { echo "Kepala Seksi Jasa Pariwisata"; } ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td width="150px">Nama Pegawai</td>
                                        <td width="10px">:</td>
                                        <td>{{$users->nm_user}}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td>{{$users->username}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>{{$users->nik}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$users->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp</td>
                                        <td>:</td>
                                        <td>{{$users->no_telp}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{$users->jns_kelamin}}</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if($users->level == 0) { echo "Administrator"; } elseif($users->level == 1) { echo "Staf Jasa Pariwisata"; } elseif($users->level == 2) { echo "Kepala Seksi Jasa Pariwisata"; } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if($users->status == 0) { echo "Tidak Aktif"; } elseif($users->status == 1) { echo "Aktif"; } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h5 style="text-align: right; padding-right: 15px; color: blue;">Reset Password?</h5>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection