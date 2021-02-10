@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Edit Tanda Daftar Usaha Pariwisata
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
        <button type="button" class="close" aria-label="Close"><a href="/tdup">
              <span aria-hidden="true">&times;</span></a>
          </button>
      </div>
      <br><br>

      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="no_tdup">Nomor TDUP</label>
        <input name="no_tdup" type="text" class="form-control" id="no_tdup" value ="{{$tdup -> no_tdup}}" required="required" autocomplete="off">
        @error('no_tdup')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="tanggal">Tanggal TDUP</label>
        <input name="tanggal" type="date" class="form-control" id="tanggal" value ="{{$tdup -> tanggal}}" required="required" autocomplete="off">
      </div>
      @error('tanggal')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
        <label for="file_tdup">File TDUP <small style="color: red"> *Dalam Format JPG/JPEG/PNG</small></label>
        <br>
        <a href="{{ asset('file_tdup/' . $tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px;" src="{{ asset('file_tdup/' . $tdup->file_tdup) }}"/></a>
        @if(auth()->guard('bpw')->user())
        <input name="file_tdup" type="file" class="form-control-file" id="file_tdup" value ="{{$tdup -> file_tdup}}" required="required" autocomplete="off">
        @endif
        @error('file_tdup')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="created_at">Tanggal Ditambahkan</label>
        <input name="created_at" type="text" class="form-control" id="created_at" value ="{{$tdup -> created_at ->isoFormat('dddd, DD MMMM Y')}}" required="required" autocomplete="off" readonly>
      </div>

      @if(auth()->guard('bpw')->user())
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" required="required" autocomplete="off" readonly>{{$tdup -> keterangan}}</textarea>
      </div>

      <!-- <div class="form-group">
        <label for="tgl_verifikasi">Tanggal Verifikasi</label>
        <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value ="{{$tdup -> tgl_verifikasi}}" required="required" autocomplete="off" readonly>
      </div> -->

      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="sts_verifikasi">Status Verifikasi</label>
        <select  disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value ="{{$tdup -> sts_verifikasi}}" required="required" autocomplete="off">
          <option value="0" @if($tdup -> sts_verifikasi == "0") selected @endif>Belum Diverifikasi</option>
          <option value="2" @if($tdup -> sts_verifikasi == "2") selected @endif>Disetujui</option>
          <option value="1" @if($tdup -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
        </select>
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="form_status">Status</label>
        <select disabled="true" name="status" class="form-control" id="input_status" value ="{{$tdup -> status}}" required="required" autocomplete="off" readonly>
          <option value="1" @if($tdup -> status == "1") selected @endif>Aktif</option>
          <option value="0" @if($tdup -> status == "0") selected @endif>Tidak Aktif</option>
        </select>
      </div>
      </div>
 

      @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" required="required" autocomplete="off" value="{{$tdup -> keterangan}}">{{$tdup -> keterangan}}</textarea>
      </div>

      <!-- <div class="form-group">
        <label for="tgl_verifikasi">Tanggal Verifikasi</label>
        <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value="{{ ($tdup -> tgl_verifikasi == '0000-00-00') ? date('Y-m-d') : $tdup->tgl_verifikasi }}" required="required" autocomplete="off">
      </div> -->
      
      <div class="form-row">
      <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
        <label for="sts_verifikasi">Status Verifikasi</label>
        <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value ="{{$tdup -> sts_verifikasi}}" required="required" autocomplete="off">
          <option selected disabled="">-- Pilih Status Verifikasi --</option>
          <option value="2" @if($tdup -> sts_verifikasi == "2") selected @endif>Disetujui</option>
          <option value="1" @if($tdup -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
        </select>
      </div>
      <div class="form-group col-md-6" style="padding: 0px;">
        <label for="form_status">Status</label>
        <select name="status" class="form-control" id="input_status" value ="{{$tdup -> status}}" required="required" autocomplete="off">
          <option selected disabled="">-- Pilih Status --</option>
          <option value="1" @if($tdup -> status == "1") selected @endif>Aktif</option>
          <option value="0" @if($tdup -> status == "0") selected @endif>Tidak Aktif</option>
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