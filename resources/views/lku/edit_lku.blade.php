@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Edit Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li><a href="/lku"> Laporan Kegiatan Usaha</a></li>
      <li class="active"><a href="#"></i> Edit LKU</a></li>
    </ol>
  </section>

  <form action="#" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <section class="content">
  <div class="box">
  
    <form role="form">
    <div class="box-body">
  
    <div>
      <a href="/list_lkuBPW" class="btn btn-primary" style="float: right;">Back</a>
    </div>
    <div style="clear: both;"></div>

    <div class="form-group col-md-6">
      <label for="input_no_surat">Nomor Surat Pengantar</label>
      <input name="no_izin" type="text" class="form-control">
    </div>
    
    <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      <label for="input_tahun">Tahun LKU</label>
      <input name="no_izin" type="text" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="periode">Periode LKU</label>
      <select name="periode" class="form-control">
        <option selected>-- Pilih Periode LKU --</option>
        <option value="I">I</option>
        <option value="II">II</option>
      </select>
    </div>
    </div>
    
    <div class="form-group col-md-6">
      <label for="file_lku">File LKU</label>
      <input name="file_lku" type="file" class="form-control-file">
    </div>

    <div class="form-row col-md-6">
    <div class="form-group col-md-6">
        <label for="status">Status TDUP</label>
        <select name="sts_verifikasi" class="form-control">
        <option selected>-- Pilih Status TDUP --</option>
          <option value="1">Diterima</option>
          <option value="0">Tidak Diterima</option>
        </select>
      </div>
    <div class="form-group col-md-6">
        <label for="status">Status Izin</label>
        <select name="sts_verifikasi" class="form-control">
        <option selected>-- Pilih Status Izin --</option>
          <option value="1">Diterima</option>
          <option value="0">Tidak Diterima</option>
        </select>
    </div>
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