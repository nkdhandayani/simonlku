@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Detail Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li class="active"><a href="/lku"> Detail LKU</a></li>
    </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div>
                <a href="/lku" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
            </div>
            <br />
            <br />

            <table class="table">
                <tr>
                    <td width="200">Nama Biro</td>
                    <td width="10">:</td>
                    <td>{{$lkus->bpw->nm_bpw}}</td>
                </tr>
                <tr>
                    <td>No. Surat Pengantar</td>
                    <td>:</td>
                    <td>{{$lkus->no_surat}}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td>{{$lkus->tahun}}</td>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td>:</td>
                    <td>{{$lkus->periode}}</td>
                </tr>
                <tr>
                    <td>File Laporan Kegiatan Usaha</td>
                    <td>:</td>
                    <td>@if($lkus->file_lku) <a href="{{ asset('file_lku/' . $lkus->file_lku) }}" target="_blank">{{ $lkus->file_lku }}</a> @else - @endif</td>
                </tr>

                <tr>
                    <td>Status TDUP</td>
                    <td>:</td>
                    <td>
                      <?php
                        if($lkus->tdups->sts_verifikasi == 0) { echo "Belum Diverifikasi"; }
                        elseif($lkus->tdups->sts_verifikasi == 1) { echo "Tidak Disetujui"; }
                        elseif($lkus->tdups->sts_verifikasi == 2) { echo "Disetujui"; }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td>File Tanda Daftar Usaha Pariwisata</td>
                    <td>:</td>
                    <td>
                        @if($lkus->tdups->file_tdup) <a href="{{ asset('file_tdup/' . $$lkus->tdups->file_tdup) }}"><img width="200px" height="200px" src="{{ asset('file_tdup/' . $lkus->tdups->file_tdup) }}" /></a> @else - @endif
                    </td>
                </tr>

                <tr>
                    <td>Status Izin Operasional</td>
                    <td>:</td>
                    <td>
                      <?php
                        if($lkus->izins->sts_verifikasi == 0) { echo "Belum Diverifikasi"; }
                        elseif($lkus->izins->sts_verifikasi == 1) { echo "Tidak Disetujui"; }
                        elseif($lkus->izins->sts_verifikasi == 2) { echo "Disetujui"; }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td>File Izin Operasional</td>
                    <td>:</td>
                    <td>
                        @if($lkus->izins->file_izin) <a href="{{ asset('file_izin/' . $$lkus->izins->file_izin) }}"><img width="200px" height="200px" src="{{ asset('file_izin/' . $lkus->izins->file_izin) }}" /></a> @else - @endif
                    </td>
                </tr>

                <tr>
                    <td>Tanggal Ditambahkan</td>
                    <td>:</td>
                    <td>{{ $lkus->created_at->isoFormat('dddd, DD MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>:</td>
                    <td>
                      <?php
                        if($lkus->sts_verifikasi == 0) { echo "Belum Diverifikasi"; }
                        elseif($lkus->sts_verifikasi == 1) { echo "Tidak Disetujui"; }
                        elseif($lkus->sts_verifikasi == 2) { echo "Disetujui"; }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$lkus->keterangan}}</td>
                </tr>
                <tr>
                    <td>Diverifikasi oleh:</td>
                    <td>:</td>
                    <td>{{$lkus->user->nm_user ?? '-'}}</td>
                </tr>
                <tr>
                    <td>Tanggal Diverifikasi</td>
                    <td>:</td>
                    <td>{{$lkus -> tgl_verifikasi->isoFormat('dddd, DD MMMM Y')}}</td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection