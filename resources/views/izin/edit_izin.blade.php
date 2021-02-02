@extends('layouts.master')

@section('content')

  <section class="content-header">
      <h1>
        Data Izin Operasional
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li> Kelola Data</li>
        <li><a href="/izin"></i> Izin Operasional</a></li>
        <li class="active"><a href="#"></i> Edit Izin Operasional</a></li>
      </ol>
  </section>

  <form action="/izin/update/{{ $izin -> id_izin }}" method="post" enctype="multipart/form-data">
  @method('patch')
  {{csrf_field()}}
  <section class="content">
  <div class="box box-primary">

    <form role="form">
    <div class="box-body">

      <div>
        <a href="/izin" class="btn btn-primary btn-sm" style="float: right;">Back</a>
      </div>
      <div style="clear: both;"></div>

      <div class="form-group">
        <label for="form_no_izin">Nomor Izin Operasional</label>
        <input name="no_izin" type="text" class="form-control" id="input_no_izin" value ="{{$izin -> no_izin}}" required="required" autocomplete="off">
      </div>

      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="form_tgl_izin">Tanggal Izin Operasional</label>
        <input name="tanggal" type="date" class="form-control" id="input_tgl_izin" value ="{{$izin -> tanggal}}" required="required" autocomplete="off">
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="form_msberlakup">Masa Berlaku Izin Operasional</label>
        <input name="ms_berlaku" type="date" class="form-control" id="input_ms_berlaku" value ="{{$izin -> ms_berlaku}}" required="required" autocomplete="off">
      </div>
      </div>

      <div class="form-group">
        <label for="form_file_izin">File TDUP</label>
        <input name="file_izin" type="file" class="form-control-file" id="input_file_izin" value ="{{$izin -> file_izin}}" required="required" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="form_tgl_tambah">Tanggal Ditambahkan</label>
        <input name="created_at" type="text" class="form-control" id="input_tgl_tambah" value ="{{$izin -> created_at}}" required="required" autocomplete="off" readonly>
      </div>

      @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
      <div class="form-group">
        <label for="form_keterangan">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" id="input_keterangan" value ="{{$izin -> keterangan}}" required="required" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="form_tgl_verifikasi">Tanggal Verifikasi</label>
        <input name="tgl_verifikasi" type="date" class="form-control" id="input_tgl_verifikasi" value ="{{$izin -> tgl_verifikasi}}" required="required" autocomplete="off">
      </div>

      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="form_sts_verifikasi">Status Verifikasi</label>
        <select name="sts_verifikasi" class="form-control" id="input_sts_verifikasi" value ="{{$izin -> sts_verifikasi}}" required="required" autocomplete="off">
          <option selected>-- Pilih Status Verifikasi --</option>
          <option value="1">Disetujui</option>
          <option value="0">Tidak Disetujui</option>
        </select>
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="form_status">Status</label>
        <select name="status" class="form-control" id="input_status" value ="{{$izin -> status}}" required="required" autocomplete="off">
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