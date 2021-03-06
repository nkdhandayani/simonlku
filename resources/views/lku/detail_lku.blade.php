@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Detail LKU
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        @if (auth()->guard('user')->user())
        <li>Laporan Kegiatan Usaha</li>
        <li class="active"><a href="/lku"> Pengumpulan LKU</a></li>
        <li>Detail LKU</li>
        @else
        <li class="active"><a href="/lku">LKU</a></li>
        <li>Detail LKU</li>
        @endif
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
                    <td width="300">Nama Biro Perjalanan Wisata</td>
                    <td width="10">:</td>
                    <td>{{$lkus->bpw->nm_bpw}}</td>
                </tr>
                <tr>
                    <td>Nomor Surat Pengantar</td>
                    <td>:</td>
                    <td>{{$lkus->no_surat}}</td>
                </tr>
                <tr>
                    <td>Tahun LKU</td>
                    <td>:</td>
                    <td>{{$lkus->tahun}}</td>
                </tr>
                <tr>
                    <td>Periode LKU</td>
                    <td>:</td>
                    <td>{{$lkus->periode}}</td>
                </tr>
                <tr>
                    <td>File Laporan Kegiatan Usaha</td>
                    <td>:</td>
                    <td>
                        <a href="{{ asset('file_lku/' . $lkus->file_lku) }}" target="_blank">{{ $lkus->file_lku }}</a>
                    </td>
                </tr>
                <tr>
                    <td>File Tanda Daftar Usaha Pariwisata</td>
                    <td>:</td>
                    <td>
                        <a href="{{ asset('file_tdup/' . $lkus->tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_tdup/' . $lkus->tdup->file_tdup) }}" /></a>
                    </td>
                </tr>
                <tr>
                    <td>Status TDUP</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($lkus->tdup->sts_verifikasi == 0)
                            {
                                echo "Sedang Diproses";
                            }
                        elseif($lkus->tdup->sts_verifikasi == 1)
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
                    <td>File Izin Operasional</td>
                    <td>:</td>
                    <td>
                        <a href="{{ asset('file_izin/' . $lkus->izin->file_izin) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_izin/' . $lkus->izin->file_izin) }}" /></a>
                    </td>
                </tr>
                <tr>
                    <td>Status Izin Operasional</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($lkus->izin->sts_verifikasi == 0)
                            {
                                echo "Sedang Diproses";
                            }
                        elseif($lkus->izin->sts_verifikasi == 1)
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
                    <td>Tanggal Ditambahkan</td>
                    <td>:</td>
                    <td>{{ $lkus->created_at->isoFormat('dddd, DD MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($lkus->sts_verifikasi == 0)
                            {
                                echo "Sedang Diproses";
                            }
                        elseif($lkus->sts_verifikasi == 1)
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
                        if($lkus->keterangan == null)
                            {
                                echo "-";
                            }
                        else
                            {
                                echo $lkus->keterangan;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Diverifikasi oleh</td>
                    <td>:</td>
                    <td>
                        {{$lkus->user->nm_user ?? '-'}}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Verifikasi</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($lkus->tgl_verifikasi == null)
                            {
                                echo "-";
                            }
                        elseif($lkus->tgl_verifikasi != null)
                            {
                                echo $lkus->tgl_verifikasi->isoFormat('dddd, DD MMMM Y');
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Status LKU</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($lkus->status == '0')
                            {
                                echo "Aktif";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection