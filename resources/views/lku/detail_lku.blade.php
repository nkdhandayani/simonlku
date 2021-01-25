@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Data Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/lku"></i> Laporan Kegiatan Usaha</a></li>
    </ol>
  </section>

  <section class="content" style="padding-top: 0;">
  <div class="box box-primary">
    <div class="box-body">
      <table class="table">
        <tr>
          <td>Nama Biro</td>
          <td>:</td>
          <td>{{$detailLKU->bpw->nm_bpw}}</td>
        </tr>
        <tr> 
          <td>No. Surat Pengantar</td>
          <td>:</td>
          <td>{{$detailLKU->no_surat}}</td>
        </tr>
        <tr>
          <td>Tahun</td>
          <td>:</td>
          <td>{{$detailLKU->tahun}}</td>
        </tr>
        <tr>
          <td>Periode</td>
          <td>:</td>
          <td>
            <?php if($detailLKU->periode == I)
                {
                   echo "I";
                }
                  elseif($detailLKU->periode == II)
                {
                    echo "II";
                }
                  else
                {
                    echo "-";
                }                          
            ?>
          </td>
        </tr>
        <tr>
          <td>File Laporan Kegiatan Usaha</td>
          <td>:</td>
          <td>{{$detailLKU->file_lku}}</td>
        </tr>

        <tr>
          <td>Status TDUP</td>
          <td>:</td>
          <td>                
            <?php if($detailLKU->tdup->status == 0)
                {
                   echo "Tidak Disetujui";
                }
                  elseif($detailLKU->tdup->status == 1)
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
          <td>Status Izin Operasional</td>
          <td>:</td>
          <td>                
            <?php if($detailLKU->izin->status == 0)
                {
                   echo "Tidak Disetujui";
                }
                  elseif($detailLKU->izin->status == 1)
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
          <td>Tanggal Ditambahkan</td>
          <td>:</td>
          <td>{{$detailLKU->created_at}}</td>
        </tr>
        <tr>
          <td>Status Verifikasi</td>
          <td>:</td>
          <td>                
            <?php if($detailLKU->status == 0)
                {
                   echo "Tidak Disetujui";
                }
                  elseif($detailLKU->status == 1)
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
          <td>{{$detailLKU->keterangan}}</td>
        </tr>
        <tr>
          <td>Tanggal Verifikasi</td>
          <td>:</td>
          <td>{{$detailLKU->tgl_verifikasi}}</td>
        </tr>
        <tr>
          <td>Diverifikasi oleh:</td>
          <td>:</td>
          <td>{{$detailLKU->user->nm_user}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td>
            <?php if($detailLKU->status == 0)
                 {
                    echo "Tidak Aktif";
                 }
                  elseif($detailLKU->status == 1)
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
      <a href="/lku" class="btn btn-primary">Back</a>
    </div>

  </div>
  </section>  
@endsection