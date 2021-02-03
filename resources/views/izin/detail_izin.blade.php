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

  <section class="content" style="padding-top: 0;">
  <div class="box box-primary">
    <div class="box-body">
      <table class="table">
        <tr>
          <td>Nama Biro</td>
          <td>:</td>
          <td>{{$detailIzin->bpw->nm_bpw}}</td>
        </tr>
        <tr> 
          <td>No. Izin Operasional</td>
          <td>:</td>
          <td>{{$detailIzin->no_izin}}</td>
        </tr>
        <tr>
          <td>Tanggal Izin Operasional</td>
          <td>:</td>
          <td>{{$detailIzin->tanggal}}</td>
        </tr>
        <tr>
          <td>Masa Berlaku Izin Operasional</td>
          <td>:</td>
          <td>{{$detailIzin->ms_berlaku}}</td>
        </tr>
        <tr>
          <td>File Izin Operasional</td>
          <td>:</td>
          <td>{{$detailIzin->file_izin}}</td>
        </tr>
        <tr>
          <td>Tanggal Ditambahkan</td>
          <td>:</td>
          <td>{{$detailIzin->created_at}}</td>
        </tr>
        <tr>
          <td>Status Verifikasi</td>
          <td>:</td>
          <td>                
            <?php if($detailIzin->status == 0)
                {
                   echo "Tidak Disetujui";
                }
                  elseif($detailIzin->status == 1)
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
          <td>{{$detailIzin->keterangan}}</td>
        </tr>
        <tr>
          <td>Tanggal Verifikasi</td>
          <td>:</td>
          <td>{{$detailIzin->tgl_verifikasi}}</td>
        </tr>
        <tr>
          <td>Diverifikasi oleh:</td>
          <td>:</td>
          <td>{{$detailIzin->user->nm_user}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td>
            <?php if($detailIzin->status == 0)
                {
                   echo "Tidak Aktif";
                }
                  elseif($detailIzin->status == 1)
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
       <a href="/izin" class="btn btn-primary">Back</a>
    </div>

	</div>
	</section>  
@endsection