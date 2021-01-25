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

  <form action="#" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <section class="content">
  <div class="box">

    <form role="form">
    <div class="box-body">
  
      <div>
        <a href="lku" class="btn btn-primary" style="float: right;">Back</a>
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
      
        <div>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </div>
    </form>
  </div>
@endsection