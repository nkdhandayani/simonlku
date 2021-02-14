@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Edit Izin Operasional
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li><a href="/izin"> Izin Operasional</a></li>
        <li class="active"><a href="#"> Edit Izin Operasional</a></li>
    </ol>
</section>

<form action="/izin/update/{{ $izin -> id_izin }}" method="post" enctype="multipart/form-data">
    @method('patch') {{csrf_field()}}
    <section class="content">
        <div class="box box-primary">
            <form role="form">
                <div class="box-body">
                    <div>
                        <a href="/izin" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="no_izin">Nomor Izin Operasional</label>
                            <input name="no_izin" type="text" class="form-control" id="no_izin" value="{{$izin -> no_izin}}" required="required" autocomplete="off" />
                            @error('no_izin')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="tgl_izin">Tanggal Izin Operasional</label>
                            <input name="tgl_izin" type="date" class="form-control" id="tgl_izin" value="{{$izin -> tgl_izin -> format('Y-m-d')}}" required="required" autocomplete="off" />
                        </div>
                        @error('tgl_izin')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_izin">File izin</label>
                        <br />
                        <a href="{{ asset('file_izin/' . $izin->file_izin) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_izin/' . $izin->file_izin) }}" /></a>
                        @if(auth()->guard('bpw')->user())
                        <br />
                        <br />
                        <p style="margin-bottom: 0;">(Silakan upload ulang file Anda)</p>
                        <input name="file_izin" type="file" class="form-control-file" id="file_izin" value="{{$izin -> file_izin}}" required="required" autocomplete="off" />
                        @endif @error('file_izin')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="created_at">Tanggal Ditambahkan</label>
                        <input name="created_at" type="text" class="form-control" id="created_at" value="{{$izin -> created_at -> isoFormat('dddd, DD MMMM Y')}}" required="required" autocomplete="off" readonly />
                    </div>

                    @if(auth()->guard('bpw')->user())
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="keterangan" rows="6" autocomplete="off" placeholder="-" readonly>{{$izin -> keterangan}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                        <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value="{{$izin -> tgl_verifikasi -> format('Y-m-d')}}" required="required" autocomplete="off" readonly />
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$izin -> sts_verifikasi}}" required="required" autocomplete="off" readonly>
                                <option selected disabled="">-- Pilih Status Verifikasi --</option>
                                <option value="0" @if($izin -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                                <option value="2" @if($izin -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($izin -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status" value="{{$izin -> status}}" required="required" autocomplete="off" readonly>
                                <option selected disabled="">-- Pilih Status --</option>
                                <option value="1" @if($izin -> status == "1") selected @endif>Aktif</option>
                                <option value="0" @if($izin -> status == "0") selected @endif>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" autocomplete="off" placeholder="Masukkan Keterangan">{{$izin -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$izin -> sts_verifikasi}}" required="required" autocomplete="off">
                                <option selected disabled="">-- Pilih Status Verifikasi --</option>
                                <option value="2" @if($izin -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($izin -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value="{{$izin -> tgl_verifikasi}}" required="required" autocomplete="off" />
                        </div>
                    </div>
                    @endif

                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</form>
@endsection