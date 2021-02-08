@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Detail Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/lku"></i> Detail LKU</a></li>
    </ol>
  </section>

  <section class="content" style="padding-top: 0;">
  <div class="box box-primary">
    <div class="box-body">
      <table class="table">
        <tr>
          <td>Nama Biro</td>
          <td>:</td>
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
          <td>
            <?php
            if($lkus->periode == I)
            {
              echo "I";
            }
            elseif($lkus->periode == II)
            {
              echo "II";
            }                          
            ?>
          </td>
        </tr>
        <tr>
          <td>File Laporan Kegiatan Usaha</td>
          <td>:</td>
          <td>@if($lkus->file_lku) <a href="{{ asset('file_lku/' . $lkus->file_lku) }}"><img width="100px" src="{{ asset('file_lku/' . $lkus->file_lku) }}"/></a> @else - @endif</td>
        </tr>

        <tr>
          <td>Status TDUP</td>
          <td>:</td>
          <td>                
            <?php
            if($lkus->tdup->sts_verifikasi == 0)
            {
              echo "Belum Diverifikasi";
            }
            elseif($lkus->tdup->sts_verifikasi == 1)
            {
              echo "Tidak Disetujui";
            }
            elseif($lkus->tdup->sts_verifikasi == 2)
            {
              echo "Disetujui";
            }                          
            ?>
          </td>
        </tr>
        <tr>
          <td>File Tanda Daftar Usaha Pariwisata</td>
          <td>:</td>
          <td>@if($lkus->tdup->file_tdup) <a href="{{ asset('file_tdup/' . $$lkus->tdup->file_tdup) }}"><img width="100px" src="{{ asset('file_tdup/' . $lkus->tdup->file_tdup) }}"/></a> @else - @endif</td>
        </tr>

        <tr>
          <td>Status Izin Operasional</td>
          <td>:</td>
          <td>                
            <?php
            if($lkus->izin->sts_verifikasi == 0)
            {
              echo "Belum Diverifikasi";
            }
            elseif($lkus->izin->sts_verifikasi == 1)
            {
              echo "Tidak Disetujui";
            }
            elseif($lkus->izin->sts_verifikasi == 2)
            {
              echo "Disetujui";
            }                          
            ?>
          </td>
        </tr>
        <tr>
          <td>File Izin Operasional</td>
          <td>:</td>
          <td>@if($lkus->izin->file_izin) <a href="{{ asset('file_izin/' . $$lkus->izin->file_izin) }}"><img width="100px" src="{{ asset('file_izin/' . $lkus->izin->file_izin) }}"/></a> @else - @endif</td>
        </tr>

        <tr>
          <td>Tanggal Ditambahkan</td>
          <td>:</td>
          <td>{{$lkus->created_at}}</td>
        </tr>
        <tr>
          <td>Status Verifikasi</td>
          <td>:</td>
          <td>                
            <?php if($lkus->status == 0)
                {
                   echo "Tidak Disetujui";
                }
                  elseif($lkus->status == 1)
                {
                    echo "Disetujui";
                }
                  else
                {
                    echo "-";
                }                          
            ?>
          </td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td>{{$lkus->keterangan}}</td>
        </tr>
        <tr>
          <td>Tanggal Verifikasi</td>
          <td>:</td>
          <td>{{$lkus->tgl_verifikasi}}</td>
        </tr>
        <tr>
          <td>Diverifikasi oleh:</td>
          <td>:</td>
          <td>{{$lkus->user->nm_user}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td>
            <?php
            if($lkus->status == 0)
            {
              echo "Tidak Aktif";
            }
            elseif($lkus->status == 1)
            {
              echo "Aktif";
            }                         
            ?>            
          </td>    
        </tr>
      </table> 
    </div>

    <div class="box-footer">
      <a href="/lku" class="btn btn-primary">Back</a>
    </div>

  </div>
  </div>
  </section>  
@endsection