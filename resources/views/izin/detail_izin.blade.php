@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Detail Izin Operasional
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li><a href="/izin"> Izin Operasional</a></li>
      <li class="active"><a href="#"></i> Detail Izin Operasional</a></li>
    </ol>
  </section>

  <section class="content">
  <div class="box box-primary">
    <div class="box-body">
      <div>
        <button type="button" class="close" aria-label="Close"><a href="/izin">
              <span aria-hidden="true">&times;</span></a>
          </button>
      </div>
      <br><br>
      
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
          <td>{{ $izins->tanggal->isoFormat('dddd, DD MMMM Y') }}</td>
        </tr>
        <tr>
          <td>File Izin Operasional</td>
          <td>:</td>
          <td>@if($izins->file_izin) <a href="{{ asset('file_izin/' . $izins->file_izin) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_izin/' . $izins->file_izin) }}"/></a> @else - @endif</td>
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
                echo "Belum Diverifikasi";
              }
              elseif($izins->sts_verifikasi == 1)
              {
                echo "Tidak Disetujui";
              }
              elseif($izins->sts_verifikasi == 2)
              {
                echo "Disetujui";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td>{{$izins->keterangan}}</td>
        </tr>
        <tr>
          <td>Diverifikasi oleh:</td>
          <td>:</td>
          <td>{{$izins->user->nm_user ?? '-'}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td>
            <?php
              if($izins->status == 0)
              {
                echo "Tidak Aktif";
              }
              elseif($izins->status == 1)
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
	</section>  
@endsection