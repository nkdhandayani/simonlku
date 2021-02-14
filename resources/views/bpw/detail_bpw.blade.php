@extends('layouts.master') @section('content')
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
    <div class="box box-primary">
        <div class="box-body pad table-responsive">
            <div>
                <a href="/bpw" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
            </div>
            <br />
            <br />

            <table class="table">
                <tr>
                    <td width="200px">Foto</td>
                    <td width="5px">:</td>
                    <td>
                        <?php
                        if($bpws->foto_bpw == null)
                            {
                                echo "-";
                            }
                        elseif($bpws->foto_bpw != null)
                            {
                                echo $bpws->foto_bpw;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Nama Biro</td>
                    <td>:</td>
                    <td>{{$bpws->nm_bpw}}</td>
                </tr>
                @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
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
                    <td>No. Telp</td>
                    <td>:</td>
                    <td>{{$bpws->no_telp}}</td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($bpws->no_fax == null)
                            {
                                echo "-";
                            }
                        elseif($bpws->no_fax != null)
                            {
                                echo $bpws->no_fax;
                            }
                        ?>
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
                        elseif($bpws->status == 1)
                            {
                                echo "Aktif";
                            }
                        else
                            {
                                echo "-";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection