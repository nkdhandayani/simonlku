@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Data Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li> Izin Operasional</li>
      <li class="active"><a href="#"></i> Edit Izin Operasional</a></li>
    </ol>
  </section>

  <form action="#" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <section class="content">
  <div class="box">

    <form role="form">
    <div class="box-body">

      <div>
        <a href="izin" class="btn btn-primary" style="float: right;">Back</a>
      </div>
      <div style="clear: both;"></div>

      <div class="form-group col-md-6">
          <label for="inputNo_Izin">No. Izin Operasional</label>
          <input name="no_izin" type="text" class="form-control">
      </div>

      <div class="form-row col-md-6">
      <div class="form-group col-md-6">
          <label for="input_tanggal">Tanggal Izin Operasional</label>
          <input name="tanggal" type="date" class="form-control">
      </div>
      <div class="form-group col-md-6">
          <label for="input_ms_berlaku">Masa Berlaku Izin Operasional</label>
          <input name="ms_berlaku" type="date" class="form-control">
      </div>
      </div>

      <div class="form-group col-md-6">
        <label for="file_izin">File Izin Operasional</label>
        <input name="file_izin" type="file" class="form-control-file">
      </div>

      @if(auth()->guard('user')->user()->level == 1))
      <div class="form-group col-md-6">
          <label for="status">Status Verifikasi</label>
          <select name="sts_verifikasi" class="form-control">
          <option selected>-- Pilih Status Verifikasi --</option>
            <option value="1">Disetujui</option>
            <option value="0">Belum Disetujui</option>
          </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputDeskripsi">Keterangan</label>
        <textarea name="deskripsi" class="form-control" rows="6"></textarea>
      </div>
      <div class="form-group col-md-6">
          <label for="input_tgl_verifikasi">Tanggal Verifikasi</label>
          <input name="tgl_verifikasi" type="date" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label for="status">Status</label>
        <select name="status" class="form-control">
          <option selected>-- Pilih Status --</option>
          <option value="1">Aktif</option>
          <option value="0">Tidak Aktif</option>
        </select>
      </div>
      @endif
  
      <div>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

    </div>
    </form>
    </div>
  </section>
  </form>
@endsection