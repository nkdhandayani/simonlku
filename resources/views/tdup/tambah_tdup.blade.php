@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Tambah Data TDUP
    </h1>
    <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li> Kelola Data</li>
        <li><a href="/tdup"></i> Tanda Daftar Usaha Pariwisata</a></li>
        <li class="active"><a href="#"></i> Tambah TDUP</a></li>
      </ol>
  </section>
 
  <form action="/tdup/store" method="post" enctype="multipart/form-data">
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
          <input name="no_tdup" type="text" class="form-control">
        </div>

        <div class="form-row">
        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
          <label for="tanggal">Tanggal TDUP</label>
          <input name="tanggal" type="date" class="form-control">
        </div>
        <div class="form-group col-md-6" style="padding: 0px;">
          <label for="ms_berlaku">Masa Berlaku TDUP</label>
          <input name="ms_berlaku" type="date" class="form-control">
        </div>
        </div>
      
        <div class="form-group">
          <label for="file_tdup">File TDUP</label>
          <input name="file_tdup" type="file" class="form-control-file">
        </div>
      
        <div>
          <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </div>
    </form>
  </div>
</div>
</section>
  
@endsection