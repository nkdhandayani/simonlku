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

  <form action="/lku/update/{{ $lku -> id_lku }}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <section class="content">
  <div class="box">
  
    <form role="form">
    <div class="box-body">
  
    <div>
      <a href="/lku" class="btn btn-primary" style="float: right;">Back</a>
    </div>
    <div style="clear: both;"></div>

    <div class="form-group">
      <label for="no_surat">Nomor Surat Pengantar</label>
      <input name="no_surat" type="text" class="form-control" id="no_surat" value ="{{$lku -> no_surat}}" required="required" autocomplete="off">
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="tahun">Tahun LKU</label>
      <input name="tahun" type="text" class="form-control" id="tahun" value ="{{$lku -> tahun}}" required="required" autocomplete="off">
    </div>
    <div class="form-group col-md-6" style="padding: 0px;">
      <label for="periode">-- Pilih Periode LKU --</label>
      <select  disabled="true" name="periode" class="form-control" id="periode" value ="{{$lku -> periode}}" required="required" autocomplete="off">
        <option value="0" @if($lku -> periode == "I") selected @endif>I</option>
        <option value="1" @if($lku -> periode == "II") selected @endif>II</option>
      </select>
    </div>
    </div>
    
    <div class="form-group">
      <label for="file_lku">File lku</label>
      <br>
      <a href="{{ asset('file_lku/' . $lku->file_lku) }}"><img width="250px" src="{{ asset('file_lku/' . $lku->file_lku) }}"/></a>
      @if(auth()->guard('bpw')->user())
      <input name="file_lku" type="file" class="form-control-file" id="file_lku" value ="{{$lku -> file_lku}}" required="required" autocomplete="off">
      @endif
    </div>

    <div class="form-group">
        <label for="created_at">Tanggal Ditambahkan</label>
        <input name="created_at" type="text" class="form-control" id="created_at" value ="{{$lku -> created_at}}" required="required" autocomplete="off" readonly>
      </div>

    <div class="form-row">
    <div class="form-group col-md-6"  style="padding: 0; padding-right: 10px">
      <label for="sts_verifikasi">Status TDUP</label>
      <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value ="{{$lku -> tdup -> sts_verifikasi}}" required="required" autocomplete="off">
        <option value="0" @if($lku -> tdup -> sts_verifikasi == "0") selected @endif>Belum Diverifikasi</option>
        <option value="2" @if($lku -> tdup -> sts_verifikasi == "2") selected @endif>Disetujui</option>
        <option value="1" @if($lku -> tdup -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
      </select>
    </div>

    <div class="form-group col-md-6"  style="padding: 0; padding-right: 10px">
      <label for="sts_verifikasi">Status Izin</label>
      <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value ="{{$lku -> izin -> sts_verifikasi}}" required="required" autocomplete="off">
        <option value="0" @if($lku -> izin -> sts_verifikasi == "0") selected @endif>Belum Diverifikasi</option>
        <option value="2" @if($lku -> izin -> sts_verifikasi == "2") selected @endif>Disetujui</option>
        <option value="1" @if($lku -> izin -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
      </select>
    </div>
    </div>

    @if(auth()->guard('user')->user()->level == 1))
    <div class="form-group">
      <label for="keterangan">Keterangan</label>
      <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" required="required" autocomplete="off" value="{{$lku -> keterangan}}">{{$lku -> keterangan}}</textarea>
    </div>

    <div class="form-group">
      <label for="tgl_verifikasi">Tanggal Verifikasi</label>
      <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value="{{ ($lku -> tgl_verifikasi == '0000-00-00') ? date('Y-m-d') : $lku->tgl_verifikasi }}" required="required" autocomplete="off">
    </div>
      
    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="sts_verifikasi">Status Verifikasi</label>
      <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value ="{{$lku -> sts_verifikasi}}" required="required" autocomplete="off">
        <option disabled selected>-- Pilih Status Verifikasi --</option>
        <option value="2" @if($lku -> sts_verifikasi == "2") selected @endif>Disetujui</option>
        <option value="1" @if($lku -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
      </select>
    </div>
    <div class="form-group col-md-6" style="padding: 0px;">
      <label for="form_status">Status</label>
      <select name="status" class="form-control" id="input_status" value ="{{$lku -> status}}" required="required" autocomplete="off">
        <option disabled selected>-- Pilih Status --</option>
        <option value="1" @if($lku -> status == "1") selected @endif>Aktif</option>
        <option value="0" @if($lku -> status == "0") selected @endif>Tidak Aktif</option>
      </select>
    </div>
    </div>
    @endif

    <div>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>

    </div>
  </div>
  </form>
  </div>
</section>
</form>
@endsection