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
                    <div class="d-flex flex-column align-items-center text-center" style="padding:20px;">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150" />
                        <div class="mt-3">
                            <h3>
                                @if(\Auth::guard('user')->check())
                                {{ \Auth::guard('user')->user()->nm_user }}
                                @elseif(\Auth::guard('bpw')->check())
                                {{ \Auth::guard('bpw')->user()->nm_bpw }}
                                @endif
                            </h3>
                            <p class="text-muted font-size-sm">
                                @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0')
                                Administrator
                                @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
                                Staf Jasa Pariwisata
                                @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '2')
                                Kepala Seksi Jasa Pariwisata
                                @endif

                                @if(\Auth::guard('bpw')->user())
                                Biro Perjalanan Wisata
                                @endif
                            </p>
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
                    <td>X</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Nama PIC</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Nama Pimpinan</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Jenis BPW</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Status Kantor</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>NIB</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                @endif

                @if(\Auth::guard('user')->user())
                <tr>
                    <td width="150px">Nama Pegawai</td>
                    <td width="10px">:</td>
                    <td>{{$users->nm_user}}</td>
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
                        elseif($users->level == 1)
                            {
                                echo "Staf Jasa Pariwisata";
                            }
                        elseif($users->level == 2)
                            {
                                echo "Kepala Seksi Jasa Pariwisata";
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
                        elseif($users->status == 1)
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
                <h5 style="text-align: right; padding-right: 15px; color:blue;">Ganti Password?</h5>
      </div>
    </div>
  </div>
    </div>
</section>
@endsection