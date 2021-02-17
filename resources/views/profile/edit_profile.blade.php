@extends('layouts.master') @section('content')
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

@if(\Auth::guard('bpw')->user())
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
                    
                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="nm_bpw">Nama BPW</label>
                            <input name="nm_bpw" type="text" class="form-control" id="nm_bpw" value="" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="username">Username</label>
                            <input name="username" type="username" class="form-control" id="username" value="" required="required" autocomplete="off" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" type="textarea" class="form-control" id="alamat" rows="6" required="required" autocomplete="off"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" value="" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="nib">Nomor Induk Berusaha</label>
                            <input name="nib" type="text" class="form-control" id="nib" value="" required="required" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="no_telp">Nomor Telepon</label>
                            <input name="no_telp" type="text" class="form-control" id="no_telp" value="" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="no_fax">Nomor Fax</label>
                            <input name="no_fax" type="text" class="form-control" id="no_fax" value="" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="nm_pic">Nama PIC</label>
                            <input name="nm_pic" type="text" class="form-control" id="nm_pic" value="" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="nm_pimpinan">Nama Pimpinan</label>
                            <input name="nm_pimpinan" type="text" class="form-control" id="nm_pimpinan" value="" required="required" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="jns_BPW">Jenis BPW</label>
                            <select name="jns_bpw" class="form-control" id="jns_bpw" value="" required="required" autocomplete="off">
                                <option selected>-- Pilih Jenis BPW --</option>
                                <option value="">BPW</option>
                                <option value="">MICE</option>
                                <option value="">Lanjut Usia</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="sts_kantor">Status Kantor</label>
                            <select name="sts_kantor" class="form-control" id="sts_kantor" value="" required="required" autocomplete="off">
                                <option selected>-- Pilih Status Kantor --</option>
                                <option value="">Hak Pribadi</option>
                                <option value="">Kontrak</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 0px;">
                            <label for="kabupaten">Kabupaten/Kota</label>
                            <select name="kabupaten" class="form-control" id="kabupaten" required="required" autocomplete="off">
                                <option selected>-- Pilih Kabupaten/Kota --</option>
                                <option value="">Kota Denpasar</option>
                                <option value="">Badung</option>
                                <option value="">Gianyar</option>
                                <option value="">Bangli</option>
                                <option value="">Tabanan</option>
                                <option value="">Jembrana</option>
                                <option value="">Buleleng</option>
                                <option value="">Klungkung</option>
                                <option value="">Karangasem</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="foto_bpw">Foto Biro</label>
                            <input name="foto_bpw" type="file" class="form-control-file" id="foto_bpw" value="" required="required" autocomplete="off" />
                            @error('foto_bpw')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                        <div>
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 20px; text-align: left">Simpan</button>
                    </div>

                  
                    
@endif 


@if(\Auth::guard('user')->user())
<form action="/profile/update/" method="post" enctype="multipart/form-data">
    @method('patch') {{csrf_field()}}

    <section class="content">
        <div class="box box-primary">
            <form role="form">
                <div class="box-body pad table-responsive">
                    <div>
                        <a href="/profile" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br />
                    <br />

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="form_nm_user">Nama Pengguna</label>
                            <input name="nm_user" type="text" class="form-control" id="input_nm_user" value="{{$users -> nm_user}}" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="username">Username</label>
                            <input name="username" type="username" class="form-control" id="username" value="{{$users -> username}}" required="required" autocomplete="off" readonly />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="form_nik">NIK</label>
                            <input name="nik" type="text" class="form-control" id="input_nik" value="{{$users -> nik}}" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="form_Email">E-mail</label>
                            <input name="email" type="email" class="form-control" id="input_email" value="{{$users -> email}}" required="required" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                            <label for="form_no_telp">Nomor Telepon</label>
                            <input name="no_telp" type="text" class="form-control" id="input_no_telp" value="{{$users -> no_telp}}" required="required" autocomplete="off" />
                        </div>
                        <div class="form-group col-md-6" style="padding: 0;">
                            <label for="form_jns_kelamin">Jenis Kelamin</label>
                            <select name="jns_kelamin" class="form-control" id="input_jns_kelamin" value="{{$users -> jns_kelamin}}" required="required" autocomplete="off">
                                <option selected disabled="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" @if($users -> jns_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($users -> jns_kelamin == "Perempuan") selected @endif>Perempuan</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="foto_user">Foto Pegawai</label>
                            <input name="foto_user" type="file" class="form-control-file" id="foto_user" value="{{$users -> foto_user}}" required="required" autocomplete="off" />
                            @error('foto_user')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>

                

@endif
</div>
            </form>
        </div>
    </section>
</form>

                </div>
            </div>

@endsection