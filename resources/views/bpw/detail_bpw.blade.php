@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Detail Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li><a href="/bpw"> Biro Perjalanan Wisata</a></li>
        <li class="active"><a href="#">Detail Biro Perjalanan Wisata</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div>
                        <a href="/bpw" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center user">
                                    @if($bpws->foto_bpw != null)
                                        <a href="{{ asset('avatar_bpw/' . $bpws->foto_bpw) }}"><img width="180px" height="180px" src="{{ asset('avatar_bpw/' . $bpws->foto_bpw) }}" class="img-circle" alt="User Image" /></a>
                                    @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="180px" height="180px" class="img-circle" alt="User Image" style="padding-top: 10px;" />
                                    @endif
                                    <div class="mt-3">
                                        <h3>
                                            {{$bpws->nm_bpw}}
                                        </h3>
                                        <p class="text-muted font-size-sm">
                                            Biro Perjalanan Wisata
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
                                        <td width="200">Nama Biro Perjalanan Wisata</td>
                                        <td width="10px">:</td>
                                        <td>{{$bpws->nm_bpw}}</td>
                                    </tr>
                                    @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0')
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td>{{$bpws->username}}</td>
                                    </tr>
                                    @endif
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
                                        <td>Nomor Telp</td>
                                        <td>:</td>
                                        <td>{{$bpws->no_telp}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Fax</td>
                                        <td>:</td>
                                        <td>
                                            @if($bpws->no_fax != null)
                                                {{$bpws->no_fax}}
                                            @else
                                                -
                                            @endif
                                        </td>
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
                                        <td>Jenis Biro Perjalanan Wisata</td>
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
                                </table>
                            </div>
                        </div>
                    </div>

                    @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
                    <div style="float: right;">
                        <div style="clear: both;"></div>
                        <a href="/bpw/reset/{{$bpws -> id_bpw}}"><button class="btn btn-primary btn-sm">Reset Password?</button></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection