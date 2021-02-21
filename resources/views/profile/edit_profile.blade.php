@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Profile Pengguna
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active"><a href="#">Profile Pengguna</a></li>
    </ol>
</section>

<div class="row">
    <div class="col-xs-12">
        <form action="/profile/update/" method="post" enctype="multipart/form-data">
            @method('patch') {{csrf_field()}}

            <section class="content">
                <div class="box box-primary">
                    <form role="form">
                        <div class="box-body">
                            <div>
                                <a href="/profile" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </div>
                            <br />
                            <br />

                            @if(\Auth::guard('bpw')->user())
                            <div class="form-group" style="padding: 0; margin-bottom: 5px;">
                                <label for="nm_bpw">Nama BPW</label>
                                <input name="nm_bpw" type="text" class="form-control" id="nm_bpw" onkeypress="return hanyaHuruf(event)" value="{{$bpws -> nm_bpw}}" required autocomplete="off" />
                                @error('nm_bpw')
                                <span class="invalid-feedback text-danger" role="alert">
                                    Nama BPW terdiri dari 6-50 karakter.
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" type="textarea" class="form-control" id="alamat" rows="6" required autocomplete="off">{{$bpws -> alamat}}</textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="email">E-mail</label>
                                    <input name="email" type="email" class="form-control" id="email" value="{{$bpws -> email}}" required autocomplete="off" />
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="nib">Nomor Induk Berusaha</label>
                                    <input name="nib" type="text" class="form-control" id="nib" onkeypress="return hanyaAngka(event)" value="{{$bpws -> nib}}" required autocomplete="off" />
                                    @error('nib')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        NIK terdiri dari 13-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input name="no_telp" type="text" class="form-control" id="no_telp" onkeypress="return hanyaAngka(event)" value="{{$bpws -> no_telp}}" required autocomplete="off" />
                                    @error('no_telp')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nomor Telepon terdiri dari 7-15 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="no_fax">Nomor Fax</label>
                                    <input name="no_fax" type="text" class="form-control" id="no_fax" onkeypress="return hanyaAngka(event)" value="{{$bpws -> no_fax}}{{ old('no_fax') }}" autocomplete="off" />
                                    @error('no_fax')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nomor Fax terdiri dari 7-15 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="nm_pic">Nama PIC</label>
                                    <input name="nm_pic" type="text" class="form-control" id="nm_pic" onkeypress="return hanyaHuruf(event)" value="{{$bpws -> nm_pic}}" required autocomplete="off" />
                                    @error('nm_pic')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nama PIC terdiri dari 6-50 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="nm_pimpinan">Nama Pimpinan</label>
                                    <input name="nm_pimpinan" type="text" class="form-control" id="nm_pimpinan" onkeypress="return hanyaHuruf(event)" value="{{$bpws -> nm_pimpinan}}" required autocomplete="off" />
                                    @error('nm_pimpinan')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nama Pimpinan terdiri dari 6-50 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="jns_BPW">Jenis BPW</label>
                                    <select name="jns_bpw" class="form-control" id="jns_bpw" value="{{$bpws -> jns_bpw}}" required autocomplete="off">
                                        <option selected>-- Pilih Jenis BPW --</option>
                                        <option value="BPW" @if($bpws -> jns_bpw == "BPW") selected @endif>BPW</option>
                                        <option value="MICE" @if($bpws -> jns_bpw == "MICE") selected @endif>MICE</option>
                                        <option value="Lanjut Usia" @if($bpws -> jns_bpw == "Lanjut Usia") selected @endif>Lanjut Usia</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="sts_kantor">Status Kantor</label>
                                    <select name="sts_kantor" class="form-control" id="sts_kantor" value="{{$bpws -> sts_kantor}}" required autocomplete="off">
                                        <option selected>-- Pilih Status Kantor --</option>
                                        <option value="Hak Pribadi" @if($bpws -> sts_kantor == "Hak Pribadi") selected @endif>Hak Pribadi</option>
                                        <option value="Kontrak" @if($bpws -> sts_kantor == "Kontrak") selected @endif>Kontrak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="kabupaten">Kabupaten/Kota</label>
                                    <select name="kabupaten" class="form-control" id="kabupaten" required autocomplete="off">
                                        <option selected>-- Pilih Kabupaten/Kota --</option>
                                        <option value="Kota Denpasar" @if($bpws -> kabupaten == "Kota Denpasar") selected @endif>Kota Denpasar</option>
                                        <option value="Badung" @if($bpws -> kabupaten == "Badung") selected @endif>Badung</option>
                                        <option value="Gianyar" @if($bpws -> kabupaten == "Gianyar") selected @endif>Gianyar</option>
                                        <option value="Bangli" @if($bpws -> kabupaten == "Bangli") selected @endif>Bangli</option>
                                        <option value="Tabanan" @if($bpws -> kabupaten == "Tabanan") selected @endif>Tabanan</option>
                                        <option value="Jembrana" @if($bpws -> kabupaten == "Jembrana") selected @endif>Jembrana</option>
                                        <option value="Buleleng" @if($bpws -> kabupaten == "Buleleng") selected @endif>Buleleng</option>
                                        <option value="Klungkung" @if($bpws -> kabupaten == "Klungkung") selected @endif>Klungkung</option>
                                        <option value="Karangasem" @if($bpws -> kabupaten == "Karangasem") selected @endif>Karangasem</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 30px;">
                                    <label for="foto_bpw">Foto Biro</label>
                                    <input name="foto_bpw" type="file" class="form-control-file" id="foto_bpw" value="" required autocomplete="off" />
                                    @error('foto_bpw')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            @if(\Auth::guard('user')->user())
                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                                    <label for="form_nm_user">Nama Pengguna</label>
                                    <input name="nm_user" type="text" class="form-control" id="input_nm_user" onkeypress="return hanyaHuruf(event)" value="{{$users -> nm_user}}" required autocomplete="off" />
                                    @error('nm_user')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nama Pegawai terdiri dari 6-50 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 35px;">
                                    <label for="form_nik">NIK</label>
                                    <input name="nik" type="text" class="form-control" id="input_nik" onkeypress="return hanyaAngka(event)" value="{{$users -> nik}}" required autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                                    <label for="form_Email">E-mail</label>
                                    <input name="email" type="email" class="form-control" id="input_email" value="{{$users -> email}}" required autocomplete="off" />
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 35px;">
                                    <label for="form_no_telp">Nomor Telepon</label>
                                    <input name="no_telp" type="text" class="form-control" id="input_no_telp" onkeypress="return hanyaAngka(event)" value="{{$users -> no_telp}}" required autocomplete="off" />
                                    @error('no_telp')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Username bersifat unik dari 6-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                                    <label for="form_jns_kelamin">Jenis Kelamin</label>
                                    <select name="jns_kelamin" class="form-control" id="input_jns_kelamin" value="{{$users -> jns_kelamin}}" required autocomplete="off">
                                        <option selected disabled="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" @if($users -> jns_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
                                        <option value="Perempuan" @if($users -> jns_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 30px;">
                                    <label for="foto_user">Foto Pegawai</label>
                                    <input name="foto_user" type="file" class="form-control-file" id="foto_user" value="{{$users -> foto_user}}" autocomplete="off" />
                                    @error('foto_user')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
    </div>
</div>
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

    function hanyaHuruf(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return true;
        return false;
    }
</script>
@endsection