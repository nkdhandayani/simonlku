@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Detail Tanda Daftar Usaha Pariwisata
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li><a href="/tdup"> Tanda Daftar Usaha Pariwisata</a></li>
        <li class="active"><a href="#"> Detail TDUP</a></li>
    </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-body pad table-responsive">
            <div>
                <a href="/tdup" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
            </div>
            <br />
            <br />

            <table class="table">
                <tr>
                    <td width="200">Nama Biro Perjalanan Wisata</td>
                    <td width="10">:</td>
                    <td>{{$tdups->bpw->nm_bpw}}</td>
                </tr>
                <tr>
                    <td>No. TDUP</td>
                    <td>:</td>
                    <td>{{$tdups->no_tdup}}</td>
                </tr>
                <tr>
                    <td>Tanggal TDUP</td>
                    <td>:</td>
                    <td>{{ $tdups->tgl_tdup->isoFormat('dddd, DD MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>File TDUP</td>
                    <td>:</td>
                    <td>
                        @if($tdups->file_tdup)
                        <a href="{{ asset('file_tdup/' . $tdups->file_tdup) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_tdup/' . $tdups->file_tdup) }}" /></a>
                        @else - @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Ditambahkan</td>
                    <td>:</td>
                    <td>{{ $tdups->created_at->isoFormat('dddd, DD MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($tdups->sts_verifikasi == 0)
                            {
                                echo "Sedang Diproses";
                            }
                        elseif($tdups->sts_verifikasi == 1)
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
                        if($tdups->keterangan == null)
                            {
                                echo "-";
                            }
                        else
                            {
                                echo $tdups->keterangan;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Diverifikasi oleh</td>
                    <td>:</td>
                    <td>
                        {{$tdups->user->nm_user ?? '-'}}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Verifikasi</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($tdups->tgl_verifikasi == null)
                            {
                                echo "-";
                            }
                        else
                            {
                                echo $tdups->tgl_verifikasi->isoFormat('dddd, DD MMMM Y');
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Status TDUP</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($tdups->status == '0') { echo "Aktif"; } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection