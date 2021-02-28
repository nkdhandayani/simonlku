@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Detail Izin Operasional
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="/izin">Izin Operasional</a></li>
        <li class="active"><a href="#">Detail Izin Operasional</a></li>
    </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div>
                <a href="/izin" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
            </div>
            <br />
            <br />

            <table class="table">
                <tr>
                    <td width="200">Nama Biro Perjalanan Wisata</td>
                    <td width="10">:</td>
                    <td>{{$izins->bpw->nm_bpw}}</td>
                </tr>
                <tr>
                    <td>No. Izin Operasional</td>
                    <td>:</td>
                    <td>{{$izins->no_izin}}</td>
                </tr>
                <tr>
                    <td>Tanggal Izin Operasional</td>
                    <td>:</td>
                    <td>{{ $izins->tgl_izin->isoFormat('dddd, DD MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>File Izin Operasional</td>
                    <td>:</td>
                    <td>
                        @if($izins->file_izin)
                            <a href="{{ asset('file_izin/' . $izins->file_izin) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_izin/' . $izins->file_izin) }}" /></a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Ditambahkan</td>
                    <td>:</td>
                    <td>{{ $izins->created_at->isoFormat('dddd, DD MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($izins->sts_verifikasi == 0)
                            {
                                echo "Sedang Diproses";
                            }
                        elseif($izins->sts_verifikasi == 1)
                            {
                                echo "Tidak Disetujui";
                            }
                        else
                            {
                                echo "Disetujui";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($izins->keterangan == null)
                            {
                                echo "-";
                            }
                        else
                            {
                                echo $izins->keterangan;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Diverifikasi oleh</td>
                    <td>:</td>
                    <td>{{$izins->user->nm_user ?? '-'}}</td>
                </tr>
                <tr>
                    <td>Tanggal Verifikasi</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($izins->tgl_verifikasi == null)
                            {
                                echo "-";
                            }
                        else
                            {
                                echo $izins->tgl_verifikasi->isoFormat('dddd, DD MMMM Y');
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Status TDUP</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($izins->status == '0') { echo "Aktif"; } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection