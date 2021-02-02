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
        <li class="active"><a href="#"></i> Edit TDUP</a></li>
      </ol>
  </section>

  <form action="/tdup/update/{{ $tdup -> id_tdup }}" method="post" enctype="multipart/form-data">
  @method('patch')
  {{csrf_field()}}
  <section class="content">
  <div class="box box-primary">

    <form role="form">
    <div class="box-body">

      <div>
        <a href="/tdup" class="btn btn-primary btn-sm" style="float: right;">Back</a>
      </div>
      <div style="clear: both;"></div>

      <div class="form-group">
        <label for="no_tdup">Nomor TDUP</label>
        <input name="no_tdup" type="text" class="form-control" id="no_tdup" value ="{{$tdup -> no_tdup}}" required="required" autocomplete="off">
      </div>

      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="tgl_tdup">Tanggal TDUP</label>
        <input name="tanggal" type="date" class="form-control" id="tgl_tdup" value ="{{$tdup -> tanggal}}" required="required" autocomplete="off">
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="ms_berlaku">Masa Berlaku TDUP</label>
        <input name="ms_berlaku" type="date" class="form-control" id="ms_berlaku" value ="{{$tdup -> ms_berlaku}}" required="required" autocomplete="off">
      </div>
      </div>

      <div class="form-group">
        <label for="file_tdup">File TDUP</label>
        <input name="file_tdup" type="file" class="form-control-file" id="file_tdup" value ="{{$tdup -> file_tdup}}" required="required" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="created_at">Tanggal Ditambahkan</label>
        <input name="created_at" type="text" class="form-control" id="created_at" value ="{{$tdup -> created_at}}" required="required" autocomplete="off" readonly>
      </div>
 
      @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" id="keterangan" value ="{{$tdup -> keterangan}}" required="required" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="tgl_verifikasi">Tanggal Verifikasi</label>
        <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value ="{{$tdup -> tgl_verifikasi}}" required="required" autocomplete="off">
      </div>
      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="sts_verifikasi">Status Verifikasi</label>
        <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value ="{{$tdup -> sts_verifikasi}}" required="required" autocomplete="off">
          <option selected>-- Pilih Status Verifikasi --</option>
          <option value="1">Disetujui</option>
          <option value="0">Tidak Disetujui</option>
        </select>
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="form_status">Status</label>
        <select name="status" class="form-control" id="input_status" value ="{{$tdup -> status}}" required="required" autocomplete="off">
          <option selected>-- Pilih Status --</option>
          <option value="1">Aktif</option>
          <option value="0">Tidak Aktif</option>
        </select>
      </div>
      </div>
      @endif
      
      <div>
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
      </div>
      
    </div>
  </div>
  </form>
  </div>
</section>
</form>
@endsection