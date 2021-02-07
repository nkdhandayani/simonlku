@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Detail Tanda Daftar Usaha Pariwisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li> Kelola Data</li>
        <li><a href="/tdup"></i> Tanda Daftar Usaha Pariwisata</a></li>
        <li class="active"><a href="#"></i> Detail TDUP</a></li>
      </ol>
  	</section>

  	<section class="content" style="padding-top: 0;">
  	<div class="box box-primary">
        <div class="box-body">
          <table class="table">
            <!-- <tr>
              <td>Nama Biro</td>
              <td>:</td>
              <td>{{$tdups->bpw->nm_bpw}}</td>
            </tr> -->
            <tr> 
              <td>No. Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$tdups->no_izin}}</td>
            </tr>
            <tr>
              <td>Tanggal Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$tdups->tanggal}}</td>
            </tr>
            <tr>
              <td>Masa Berlaku Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$tdups->ms_berlaku}}</td>
            </tr>
            <tr>
              <td>File Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$tdups->file_tdup}}</td>
            </tr>
            <tr>
              <td>Tanggal Ditambahkan</td>
              <td>:</td>
              <td>{{$tdups->created_at}}</td>
            </tr>
            <tr>
              <td>Status Verifikasi</td>
              <td>:</td>
              <td>                
                <?php
                  if($tdups->sts_verifikasi == 0)
                  {
                    echo "Belum Diverifikasi";
                  }
                  elseif($tdups->sts_verifikasi == 1)
                  {
                    echo "Tidak Disetujui";
                  }
                  elseif($tdups->sts_verifikasi == 2)
                  {
                    echo "Disetujui";
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td>{{$tdups->keterangan}}</td>
            </tr>
            <tr>
              <td>Tanggal Verifikasi</td>
              <td>:</td>
              <td>{{$tdups->tgl_verifikasi}}</td>
            </tr>
           <!--  <tr>
              <td>Diverifikasi oleh:</td>
              <td>:</td>
              <td>{{$tdups->user->nm_user}}</td>
            </tr> -->
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <?php
                if($tdups->status == 0)
                  {
                    echo "Tidak Aktif";
                  }
                    elseif($tdups->status == 1)
                  {
                    echo "Aktif";
                  }                         
                ?>            
              </td>    
            </tr>
          </table>  
        </div>

        <div class="box-footer">
          <a href="/tdup" class="btn btn-primary btn-sm">Back</a>
        </div>

	</div>
	</section>  
@endsection