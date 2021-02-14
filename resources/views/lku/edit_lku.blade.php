@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Edit Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li><a href="/lku"> Laporan Kegiatan Usaha</a></li>
        <li class="active"><a href="#"> Edit LKU</a></li>
    </ol>
</section>

<form action="/lku/update/{{ $lku -> id_lku }}" method="post" enctype="multipart/form-data">
    @method('patch') {{csrf_field()}}
    <section class="content">
        <div class="box">
            <form role="form">
                <div class="box-body">
                    <div>
                      <a href="/lku" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />

                    <div class="form-group">
                        <label for="no_surat">Nomor Surat Pengantar</label>
                        <input name="no_surat" type="text" class="form-control" id="no_surat" value="{{$lku -> no_surat}}" required="required" autocomplete="off" />
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="tahun">Tahun LKU</label>
                            <input name="tahun" type="text" class="form-control" id="tahun" value="{{$lku -> tahun}}" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="periode">Periode</label>
                            <select name="periode" class="form-control" id="periode" value="{{$lku -> periode}}" required="required" autocomplete="off">
                                <option value="I" @if($lku -> periode == "I") selected @endif>I</option>
                                <option value="II" @if($lku -> periode == "II") selected @endif>II</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file_lku">File LKU</label>
                        <br />
                        <a href="{{ asset('file_lku/' . $lku->file_lku) }}" target="_blank">{{ $lku->file_lku }}</a>
                        @if(auth()->guard('bpw')->user())
                        <br />
                        <br />
                        <p style="margin-bottom: 0;">(Silakan upload ulang file Anda)</p>
                        <input name="file_lku" type="file" class="form-control-file" id="file_lku" value="{{$lku -> file_lku}}" required="required" autocomplete="off" />
                        @endif
                    </div> 

                    <div class="form-group">
                        <label for="created_at">Tanggal Ditambahkan</label>
                        <input name="created_at" type="text" class="form-control" id="created_at" value="{{$lku -> created_at->isoFormat('dddd, DD MMMM Y')}}" required="required" autocomplete="off" readonly />
                    </div>

                    <div class="form-group">
                        <label for="file_tdup">File TDUP</label>
                        <br />
                        <a href="{{ asset('file_tdup/' . $lku->tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_tdup/' . $lku->tdup->file_tdup) }}" /></a>
                    </div>

                    <div class="form-group">
                        <label for="sts_verifikasi">Status TDUP</label>
                        <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> tdup -> sts_verifikasi}}" required="required" autocomplete="off">
                            <option value="0" @if($lku -> tdup -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                            <option value="2" @if($lku -> tdup -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                            <option value="1" @if($lku -> tdup -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file_izin">File Izin Operasional</label>
                        <br />
                        <a href="{{ asset('file_izin/' . $lku->izin->file_izin) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_izin/' . $lku->izin->file_izin) }}" /></a>
                    </div>

                    <div class="form-group">
                        <label for="sts_verifikasi">Status Izin</label>
                        <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> izin -> sts_verifikasi}}" required="required" autocomplete="off">
                            <option value="0" @if($lku -> izin -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                            <option value="2" @if($lku -> izin -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                            <option value="1" @if($lku -> izin -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                        </select>
                    </div>

                    @if(auth()->guard('bpw')->user())
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" autocomplete="off" placeholder="-" readonly>{{$lku -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> sts_verifikasi}}" required="required" autocomplete="off" readonly>
                                <option value="0" @if($lku -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                                <option value="2" @if($lku -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($lku -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value="{{$lku -> tgl_verifikasi -> format('Y-m-d')}}" required="required" autocomplete="off" readonly />
                        </div>
                    </div>

                    @if(auth()->guard('user')->user()->level == 1)
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" required="required" autocomplete="off" value="{{$lku -> keterangan}}">{{$lku -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> sts_verifikasi}}" required="required" autocomplete="off">
                                <option selected disabled="">-- Pilih Status Verifikasi --</option>
                                <option value="2" @if($lku -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($lku -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" value="{{$lku -> tgl_verifikasi}}" required="required" autocomplete="off" />
                        </div>
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