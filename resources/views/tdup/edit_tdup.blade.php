@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Edit Tanda Daftar Usaha Pariwisata
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li><a href="/tdup"> Tanda Daftar Usaha Pariwisata</a></li>
        <li class="active"><a href="#"> Edit TDUP</a></li>
    </ol>
</section>

<form action="/tdup/update/{{ $tdup -> id_tdup }}" method="post" enctype="multipart/form-data">
    @method('patch') {{csrf_field()}}
    <section class="content">
        <div class="box box-primary">
            <form role="form">
                <div class="box-body">
                    <div>
                        <a href="/tdup" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />


                    @if(auth()->guard('bpw')->user())
                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="no_tdup">Nomor TDUP</label>
                            <input name="no_tdup" type="text" class="form-control" id="no_tdup" value="{{$tdup -> no_tdup}}" required="required" autocomplete="off" />
                            @error('no_tdup')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="tgl_tdup">Tanggal TDUP</label>
                            <input name="tgl_tdup" type="date" class="form-control" id="tgl_tdup" value="{{$tdup -> tgl_tdup -> format('Y-m-d')}}" required="required" autocomplete="off" />
                        </div>
                        @error('tgl_tdup')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_tdup">File TDUP <small style="color: red;"> *Dalam Format JPG/JPEG/PNG</small></label>
                        <br />
                        <a href="{{ asset('file_tdup/' . $tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px;" src="{{ asset('file_tdup/' . $tdup->file_tdup) }}" /></a>
                        @if(auth()->guard('bpw')->user())
                        <br />
                        <br />
                        <p style="margin-bottom: 0;">(Silakan upload ulang file Anda)</p>
                        <input name="file_tdup" type="file" class="form-control-file" id="file_tdup" value="{{$tdup -> file_tdup}}" required="required" autocomplete="off" />
                        @endif @error('file_tdup')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="created_at">Tanggal Ditambahkan</label>
                        <input name="created_at" type="text" class="form-control" id="created_at" value="{{$tdup -> created_at -> isoFormat('dddd, DD MMMM Y')}}" required="required" autocomplete="off" readonly />
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" autocomplete="off" placeholder="-" readonly>{{$tdup -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$tdup -> sts_verifikasi}}" required="required" autocomplete="off" readonly>
                                <option value="0" @if($tdup -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                                <option value="2" @if($tdup -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($tdup -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" @if($tdup -> tgl_verifikasi == null)
                            value="{{$tdup -> tgl_verifikasi}}"
                            @else
                            value="{{$tdup -> tgl_verifikasi -> format('Y-m-d')}}"
                            @endif
                            required="required" autocomplete="off" readonly/>
                        </div>
                    </div>


                    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="no_tdup">Nomor TDUP</label>
                            <input name="no_tdup" type="text" class="form-control" id="no_tdup" value="{{$tdup -> no_tdup}}" autocomplete="off" readonly />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="tgl_tdup">Tanggal TDUP</label>
                            <input name="tgl_tdup" type="date" class="form-control" id="tgl_tdup" value="{{$tdup -> tgl_tdup -> format('Y-m-d')}}"autocomplete="off" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file_tdup">File TDUP <small style="color: red;"> *Dalam Format JPG/JPEG/PNG</small></label>
                        <br />
                        <a href="{{ asset('file_tdup/' . $tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px;" src="{{ asset('file_tdup/' . $tdup->file_tdup) }}" /></a>
                        @if(auth()->guard('bpw')->user())
                        <br />
                        <br />
                        <p style="margin-bottom: 0;">(Silakan upload ulang file Anda)</p>
                        <input name="file_tdup" type="file" class="form-control-file" id="file_tdup" value="{{$tdup -> file_tdup}}" required="required" autocomplete="off" />
                        @endif @error('file_tdup')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label for="created_at">Tanggal Ditambahkan</label>
                        <input name="created_at" type="text" class="form-control" id="created_at" value="{{$tdup -> created_at -> isoFormat('dddd, DD MMMM Y')}}" required="required" autocomplete="off" readonly />
                    </div>                 
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" autocomplete="off" value="{{$tdup -> keterangan}}" placeholder="Masukkan Keterangan">{{$tdup -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$tdup -> sts_verifikasi}}" required="required" autocomplete="off">
                                <option selected disabled="">-- Pilih Status Verifikasi --</option>
                                <option value="2" @if($tdup -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($tdup -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi"
                            @if($tdup -> tgl_verifikasi == null)
                            value="{{$tdup -> tgl_verifikasi}}"
                            @else
                            value="{{$tdup -> tgl_verifikasi -> format('Y-m-d')}}"
                            @endif
                            required="required" autocomplete="off" />
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </section>
</form>
@endsection