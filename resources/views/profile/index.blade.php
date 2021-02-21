@extends('layouts.master') @section('content')
<section class="content-header">
    <h1>
        Profile Pengguna
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active"><a href="#">Profile Pengguna</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center user">
                                    @if(\Auth::guard('bpw')->user())
                                        @if($bpws->foto_bpw != null)
                                            <a href="{{ asset('avatar_bpw/' . $bpws->foto_bpw) }}"><img width="180px" height="180px" src="{{ asset('avatar_bpw/' . $bpws->foto_bpw) }}" class="img-circle" alt="User Image" /></a>
                                        @else
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="180px" height="180px" class="img-circle" alt="User Image" style="padding-top: 10px;" />
                                        @endif
                                    @endif

                                    @if(\Auth::guard('user')->user())
                                        @if($users->foto_user != null)
                                            <a href="{{ asset('avatar_user/' . $users->foto_user) }}"><img width="180px" height="180px" src="{{ asset('avatar_user/' . $users->foto_user) }}" class="img-circle" alt="User Image" /></a>
                                        @else
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="180px" height="180px" class="img-circle" alt="User Image" style="padding-top: 10px;" />
                                        @endif
                                    @endif

                                    <div class="mt-3">
                                        <h3>
                                            @if(\Auth::guard('user')->check()) {{ \Auth::guard('user')->user()->nm_user }} @elseif(\Auth::guard('bpw')->check()) {{ \Auth::guard('bpw')->user()->nm_bpw }} @endif
                                        </h3>
                                        <h5 class="text-muted font-size-sm">
                                            @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0')
                                                Administrator
                                            @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
                                                Staf Jasa Pariwisata
                                            @endif

                                            @if(\Auth::guard('bpw')->user())
                                                Biro Perjalanan Wisata
                                            @endif
                                        </h5>
                                        <a href="/profile/edit"><button class="btn btn-warning btn-sm">Edit</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table class="table">
                                    @if(\Auth::guard('bpw')->user())
                                    <tr>
                                        <td width="150">Nama Biro</td>
                                        <td width="10px">:</td>
                                        <td>{{$bpws->nm_bpw}}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td>{{$bpws->username}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$bpws->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{$bpws->alamat}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td>{{$bpws->kabupaten}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:</td>
                                        <td>{{$bpws->no_telp}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Fax</td>
                                        <td>:</td>
                                        <td>{{$bpws->no_fax}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama PIC</td>
                                        <td>:</td>
                                        <td>{{$bpws->nm_pic}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pimpinan</td>
                                        <td>:</td>
                                        <td>{{$bpws->nm_pimpinan}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis BPW</td>
                                        <td>:</td>
                                        <td>{{$bpws->jns_bpw}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Kantor</td>
                                        <td>:</td>
                                        <td>{{$bpws->sts_kantor}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIB</td>
                                        <td>:</td>
                                        <td>{{$bpws->nib}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if($bpws->status == 0)
                                                {
                                                    echo "Tidak Aktif";
                                                }
                                            else
                                                {
                                                    echo "Aktif";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    @endif

                                    @if(\Auth::guard('user')->user())
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
                                            if($users->level == 0)
                                                {
                                                    echo "Administrator";
                                                }
                                            else
                                                {
                                                    echo "Staf Jasa Pariwisata";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if($users->status == 0)
                                                {
                                                    echo "Tidak Aktif";
                                                }
                                            else
                                                {
                                                    echo "Aktif";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                    <div style="float: right;">
                        <div style="clear: both;"></div>
                        <a href="/profile/ganti_pass"><button class="btn btn-primary btn-sm">Ganti Password?</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection