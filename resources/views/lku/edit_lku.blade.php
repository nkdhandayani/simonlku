@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Ubah LKU
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        @if (auth()->guard('user')->user())
        <li>Laporan Kegiatan Usaha</li>
        <li class="active"><a href="/lku"> Pengumpulan LKU</a></li>
        <li>Ubah LKU</li>
        @else
        <li class="active"><a href="/lku">LKU</a></li>
        <li>Ubah LKU</li>
        @endif
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

                    @if(auth()->guard('bpw')->user())
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat Pengantar</label>
                        <input name="no_surat" type="text" class="form-control" id="no_surat" value="{{$lku -> no_surat}}" required autocomplete="off" />
                        @error('no_surat')
                        <span class="invalid-feedback text-danger" role="alert">
                            Nomor Surat Pengantar terdiri dari 4-50 karakter.
                        </span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="tahun">Tahun LKU</label>
                            <input name="tahun" type="text" class="form-control" id="tahun" onkeypress="return hanyaAngka(event)" value="{{$lku -> tahun}}" required autocomplete="off" />
                            @error('tahun')
                            <span class="invalid-feedback text-danger" role="alert">
                                Tahun LKU terdiri dari 4 karakter.
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="periode">Periode LKU</label>
                            <select name="periode" class="form-control" id="periode" value="{{$lku -> periode}}" required autocomplete="off">
                                <option value="I" @if($lku -> periode == "I") selected @endif>I</option>
                                <option value="II" @if($lku -> periode == "II") selected @endif>II</option>
                            </select>
                            @error('periode')
                            <span class="invalid-feedback text-danger" role="alert">
                                Periode tidak boleh kosong.
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file_lku">File LKU <small style="color: red;"> *Dalam Format PDF</small></label>
                        <br />
                        <a href="{{ asset('file_lku/' . $lku->file_lku) }}" target="_blank">{{ $lku->file_lku }}</a>
                        <br />
                        <br />
                        <p style="margin-bottom: 0;">(Silakan upload ulang file Anda)</p>
                        <input name="file_lku" type="file" class="form-control-file" id="file_lku" value="{{$lku -> file_lku}}" autocomplete="off" required />
                        @error('file_lku')
                        <span class="invalid-feedback text-danger" role="alert">
                            Format file yang Anda upload salah.
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="created_at">Tanggal Ditambahkan</label>
                        <input name="created_at" type="text" class="form-control" id="created_at" value="{{$lku -> created_at->isoFormat('dddd, DD MMMM Y')}}" required autocomplete="off" readonly />
                    </div>

                    <div class="form-group">
                        <label for="file_tdup">File TDUP</label>
                        <br />
                        <a href="{{ asset('file_tdup/' . $lku->tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_tdup/' . $lku->tdup->file_tdup) }}" /></a>
                    </div>

                    <div class="form-group">
                        <label for="sts_verifikasi">Status TDUP</label>
                        <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> tdup -> sts_verifikasi}}" required autocomplete="off" readpnly>
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
                        <label for="sts_verifikasi">Status Izin Operasional</label>
                        <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> izin -> sts_verifikasi}}" required autocomplete="off" readonly>
                            <option value="0" @if($lku -> izin -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                            <option value="2" @if($lku -> izin -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                            <option value="1" @if($lku -> izin -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" autocomplete="off" placeholder="Masukkan Keterangan" readonly="">{{$lku -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> sts_verifikasi}}" required autocomplete="off" readonly>
                                <option selected disabled="">-- Pilih Status Verifikasi --</option>
                                <option value="2" @if($lku -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($lku -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6" style="padding: 0px; margin-bottom: 35px;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" @if($lku -> tgl_verifikasi == null) value="{{$lku -> tgl_verifikasi}}" @else value="{{$lku -> tgl_verifikasi ->
                            format('Y-m-d')}}" @endif required autocomplete="off" readonly/>
                        </div>
                    </div>

                    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat Pengantar</label>
                        <input name="no_surat" type="text" class="form-control" id="no_surat" value="{{$lku -> no_surat}}" required autocomplete="off" readonly />
                        @error('no_surat')
                        <span class="invalid-feedback text-danger" role="alert">
                            Nomor Surat Pengantar terdiri dari 4-20 karakter.
                        </span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="tahun">Tahun LKU</label>
                            <input name="tahun" type="text" class="form-control" id="tahun" value="{{$lku -> tahun}}" required autocomplete="off" readonly />
                            @error('tahun')
                            <span class="invalid-feedback text-danger" role="alert">
                                Tahun LKU terdiri dari 4 karakter.
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0px;">
                            <label for="periode">Periode</label>
                            <select name="periode" class="form-control" id="periode" value="{{$lku -> periode}}" required autocomplete="off" readonly>
                                <option value="I" @if($lku -> periode == "I") selected @endif>I</option>
                                <option value="II" @if($lku -> periode == "II") selected @endif>II</option>
                            </select>
                            @error('periode')
                            <span class="invalid-feedback text-danger" role="alert">
                                Periode tidak boleh kosong.
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file_lku">File LKU <small style="color: red;"> *Dalam Format PDF</small></label>
                        <br />
                        <a href="{{ asset('file_lku/' . $lku->file_lku) }}" target="_blank">{{ $lku->file_lku }}</a>
                    </div>

                    <div class="form-group">
                        <label for="created_at">Tanggal Ditambahkan</label>
                        <input name="created_at" type="text" class="form-control" id="created_at" value="{{$lku -> created_at->isoFormat('dddd, DD MMMM Y')}}" required autocomplete="off" readonly />
                    </div>

                    <div class="form-group">
                        <label for="file_tdup">File TDUP</label>
                        <br />
                        <a href="{{ asset('file_tdup/' . $lku->tdup->file_tdup) }}" target="_blank"><img width="200px" height="200px" src="{{ asset('file_tdup/' . $lku->tdup->file_tdup) }}" /></a>
                    </div>

                    <div class="form-group">
                        <label for="sts_verifikasi">Status TDUP</label>
                        <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> tdup -> sts_verifikasi}}" required autocomplete="off" readonly>
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
                        <label for="sts_verifikasi">Status Izin Operasional</label>
                        <select disabled="true" name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> izin -> sts_verifikasi}}" required autocomplete="off" readonly>
                            <option value="0" @if($lku -> izin -> sts_verifikasi == "0") selected @endif>Sedang Diproses</option>
                            <option value="2" @if($lku -> izin -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                            <option value="1" @if($lku -> izin -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="textarea" class="form-control" id="input_keterangan" rows="6" autocomplete="off" placeholder="Masukkan Keterangan">{{$lku -> keterangan}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="sts_verifikasi">Status Verifikasi</label>
                            <select name="sts_verifikasi" class="form-control" id="sts_verifikasi" value="{{$lku -> sts_verifikasi}}" required autocomplete="off">
                                <option selected disabled="">-- Pilih Status Verifikasi --</option>
                                <option value="2" @if($lku -> sts_verifikasi == "2") selected @endif>Disetujui</option>
                                <option value="1" @if($lku -> sts_verifikasi == "1") selected @endif>Tidak Disetujui</option>
                            </select>
                            @error('sts_verifikasi')
                            <span class="invalid-feedback text-danger" role="alert">
                                Status Verifikasi tidak boleh kosong.
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="padding: 0px; margin-bottom: 35px;">
                            <label for="tgl_verifikasi">Tanggal Verifikasi</label>
                            <input name="tgl_verifikasi" type="date" class="form-control" id="tgl_verifikasi" @if($lku -> tgl_verifikasi == null) value="{{$lku -> tgl_verifikasi}}" @else value="{{$lku -> tgl_verifikasi ->
                            format('Y-m-d')}}" @endif required autocomplete="off" />
                        </div>
                    </div>
                    @endif

                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>
</form>
@endsection

@section('js')
<script type="text/javascript">
    @if($errors->any())
      $('#exampleModal').modal();
    @endif

    function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@endsection