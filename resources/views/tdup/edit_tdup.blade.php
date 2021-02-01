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

  <form action="/tdup/update/{{ $tdups -> id_tdup }}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <section class="content">
  <div class="box">

    <form role="form">
    <div class="box-body">

      <div>
        <a href="izin" class="btn btn-primary" style="float: right;">Back</a>
      </div>
      <div style="clear: both;"></div>

      <div class="form-group">
        <label for="form_nm_bpw">Nama Biro Perjalanan Wisata</label>
        <input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw" value ="{{$bpw -> nm_bpw}}">
      </div>
      <div class="form-group">
        <label for="form_no_tdup">Nomor TDUP</label>
        <input name="no_tdup" type="text" class="form-control" id="input_no_tdup" value ="{{$tdup -> no_tdup}}">
      </div>
      <div class="form-group">
        <label for="form_no_tdup">Nomor TDUP</label>
        <input name="no_tdup" type="text" class="form-control" id="input_no_tdup" value ="{{$tdup -> no_tdup}}">
      </div>
      <div class="form-group">
        <label for="form_tgl_tdup">Tanggal TDUP</label>
        <input name="tanggal" type="text" class="form-control" id="input_tdl_tdup" value ="{{$tdup -> tanggal}}">
      </div>
      <div class="form-group">
        <label for="form_ms_tdup">Masa Berlaku TDUP</label>
        <input name="ms_tdup" type="text" class="form-control" id="input_ms_tdup" value ="{{$tdup -> ms_tdup}}">
      </div>
      <div class="form-group">
        <label for="form_file_tdup">File TDUP</label>
        <input name="file_tdup" type="text" class="form-control-file" id="input_file_tdup" value ="{{$tdup -> file_tdup}}">
      </div>
      <div class="form-group">
        <label for="form_tgl_tambah">Tanggal Ditambahkan</label>
        <input name="created_at" type="text" class="form-control" id="input_tgl_tambah" value ="{{$tdup -> created_at}}">
      </div>

      @if(auth()->guard('user')->user()->level == 1))
      <div class="form-group">
        <label for="form_sts_verifikasi">Status Verifikasi</label>
        <select name="sts_verifikasi" class="form-control" id="input_sts_verifikasi" value ="{{$tdup -> sts_verifikasi}}">
          <option selected>-- Pilih Status Verifikasi --</option>
          <option value="1">Disetujui</option>
          <option value="0">Tidak Disetujui</option>
        </select>
      </div>
      <div class="form-group">
        <label for="form_keterangan">Keterangan</label>
        <input name="keterangan" type="text" class="form-control" id="input_keterangan" value ="{{$tdup -> keterangan}}">
      </div>
      <div class="form-group">
        <label for="form_tgl_verifikasi">Tanggal Verifikasi</label>
        <input name="tgl_verifikasi" type="text" class="form-control" id="input_tgl_verifikasi" value ="{{$tdup -> tgl_verifikasi}}">
      </div>
      <div class="form-group">
        <label for="form_status">Status</label>
        <select name="status" class="form-control" id="input_status" value ="{{$tdup -> status}}">
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