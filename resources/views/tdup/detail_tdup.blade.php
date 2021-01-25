@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Data Biro Perjalanan Wisata
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
            <tr>
              <td>Nama Biro</td>
              <td>:</td>
              <td>{{$detailTDUP->bpw->nm_bpw}}</td>
            </tr>
            <tr> 
              <td>No. Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$detailIzin->no_izin}}</td>
            </tr>
            <tr>
              <td>Tanggal Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$detailTDUP->tanggal}}</td>
            </tr>
            <tr>
              <td>Masa Berlaku Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$detailTDUP->ms_berlaku}}</td>
            </tr>
            <tr>
              <td>File Tanda Daftar Usaha Pariwisata</td>
              <td>:</td>
              <td>{{$detailTDUP->file_tdup}}</td>
            </tr>
            <tr>
              <td>Tanggal Ditambahkan</td>
              <td>:</td>
              <td>{{$detailTDUP->created_at}}</td>
            </tr>
            <tr>
              <td>Status Verifikasi</td>
              <td>:</td>
              <td>                
                <?php if($detailTDUP->status == 0)
                    {
                       echo "Tidak Disetujui";
                    }
                      elseif($detailTDUP->status == 1)
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
              <td>{{$detailTDUP->keterangan}}</td>
            </tr>
            <tr>
              <td>Tanggal Verifikasi</td>
              <td>:</td>
              <td>{{$detailTDUP->tgl_verifikasi}}</td>
            </tr>
            <tr>
              <td>Diverifikasi oleh:</td>
              <td>:</td>
              <td>{{$detailTDUP->user->nm_user}}</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <?php if($detailTDUP->status == 0)
                    {
                       echo "Tidak Aktif";
                    }
                      elseif($detailTDUP->status == 1)
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

        <div class="box-footer">
          <a href="/tdup" class="btn btn-primary">Back</a>
        </div>

	</div>
	</section>  
@endsection