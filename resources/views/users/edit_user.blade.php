@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Ubah Data Pegawai
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li><a href="/user">Pegawai Jasa Pariwisata</a></li>
        <li class="active"><a href="#">Ubah Data Pegawai</a></li>
    </ol>
</section>

<form action="/user/update/{{ $users->id_user }}" method="post" enctype="multipart/form-data">
    @method('patch') {{csrf_field()}}

    <section class="content">
        <div class="box box-primary">
            <form role="form">
                <div class="box-body pad table-responsive">
                    <div>
                        <a href="/user" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                            <label for="form_nm_user">Nama Pegawai</label>
                            <input name="nm_user" type="text" class="form-control" id="input_nm_user" onkeypress="return hanyaHuruf(event)" value="{{$users -> nm_user}}" required autocomplete="off" />
                            @error('nm_user')
                            <span class="invalid-feedback text-danger" role="alert">
                                Nama Pegawai terdiri dari 6-50 karakter.
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                            <label for="form_username">Username</label>
                            <input name="username" type="username" class="form-control" id="input_username" value="{{$users -> username}}" required autocomplete="off" />
                            @error('username')
                            <span class="invalid-feedback text-danger" role="alert">
                                Username bersifat unik dari 6-20 karakter.
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                            <label for="form_nik">NIK</label>
                            <input name="nik" type="text" class="form-control" id="input_nik" onkeypress="return hanyaAngka(event)" value="{{$users -> nik}}" required autocomplete="off" />
                            @error('nik')
                            <span class="invalid-feedback text-danger" role="alert">
                                NIK terdiri dari 16-20 karakter.
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                            <label for="form_Email">E-mail</label>
                            <input name="email" type="email" class="form-control" id="input_email" value="{{$users -> email}}" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                            <label for="form_no_telp">Nomor Telepon</label>
                            <input name="no_telp" type="text" class="form-control" id="input_no_telp" onkeypress="return hanyaAngka(event)" value="{{$users -> no_telp}}" required autocomplete="off" />
                            @error('no_telp')
                            <span class="invalid-feedback text-danger" role="alert">
                                Nomor Telepon terdiri dari 7-15 karakter.
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                            <label for="form_jns_kelamin">Jenis Kelamin</label>
                            <select name="jns_kelamin" class="form-control" id="input_jns_kelamin" value="{{$users -> jns_kelamin}}" required autocomplete="off">
                                <option selected disabled="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" @if($users -> jns_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($users -> jns_kelamin == "Perempuan") selected @endif>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="form_level">Level</label>
                            <select name="level" class="form-control" id="input_level" value="{{$users -> level}}" required autocomplete="off">
                                <option selected disabled="">-- Pilih Level --</option>
                                <option value="0" @if($users -> level == "0") selected @endif>Administrator</option>
                                <option value="1" @if($users -> level == "1") selected @endif>Staf Jasa Pariwisata</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="form_status">Status</label>
                            <select name="status" class="form-control" id="input_status" value="{{$users -> status}}" required autocomplete="off">
                                <option selected disabled="">-- Pilih Status --</option>
                                <option value="1" @if($users -> status == "1") selected @endif>Aktif</option>
                                <option value="0" @if($users -> status == "0") selected @endif>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

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

    function hanyaHuruf(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return true;
        return false;
    }
</script>
@endsection