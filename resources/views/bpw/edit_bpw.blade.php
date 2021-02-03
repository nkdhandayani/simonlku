@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Edit Biro Perjalanan Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li> Kelola Data</li>
        <li><a href="/bpw"> Biro Perjalanan Wisata</a></li>
        <li class="active"><a href="#"></i>Edit Biro Perjalanan Wisata</a></li>
      </ol>
    </section>

    <form action="/bpw/update/{{ $bpws->id_bpw }}" method="post"  enctype="multipart/form-data">
	@method('patch')
	{{csrf_field()}}

	<section class="content">
	<div class="box box-primary">
	<form role="form">
	<div class="box-body">

		<div>
		  <a href="/bpw" class="btn btn-primary btn-sm" style="float: right;">Back</a>
		</div>
  		<div style="clear: both;"></div>
	
			<div class="form-group">
		    	<label for="form_foto_bpw">Foto BPW</label>
		    	<input name="foto_bpw" type="file" class="form-control-file" id="input_foto_bpw" value ="{{$bpws -> foto_bpw}}">
			</div>
			<div class="form-group">
		    	<label for="form_nm_bpw">Nama BPW</label>
		   		<input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw" value ="{{$bpws -> nm_bpw}}">
		  	</div>
		  	<div class="form-row">
		    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
		      	<label for="form_sername">Username</label>
		      	<input name="username" type="username" class="form-control" id="input_username" value ="{{$bpws -> username}}">
		    </div>
		    <div class="form-group col-md-6" style="padding: 0;">
		      	<label for="form_assword">Password</label>
		      	<input name="password" type="password" class="form-control" id="input_password" value ="{{$bpws -> password}}">
		    </div>
		  	</div>
		  	<div class="form-group">
		      	<label for="form_Email">E-mail</label>
		      	<input name="email"type="email" class="form-control" id="input_email" value ="{{$bpws -> email}}">
			</div>
		  	<div class="form-group">
			    <label for="for_alamat">Alamat</label>
			    <textarea name="alamat" type="textarea" class="form-control" id="input_alamat" rows="6" value ="{{$bpws -> alamat}}"></textarea>
		  	</div>
			<div class="form-group">
			    <label for="form_kabupaten">Kabupaten/Kota</label>
			    <select name="kabupaten" class="form-control" id="input_kabupaten" value ="{{$bpws -> kabupaten}}">
			    	<option selected>-- Pilih Kabupaten/Kota --</option>
				    <option value="Kota Denpasar">Kota Denpasar</option>
				    <option value="Badung">Badung</option>
				    <option value="Gianyar">Gianyar</option>
			      <option value="Bangli">Bangli</option>
				    <option value="Tabanan">Tabanan</option>
				    <option value="Jembrana">Jembrana</option>
				    <option value="Buleleng">Buleleng</option>
				    <option value="Klungkung">Klungkung</option>
				    <option value="Karangasem">Karangasem</option>
			    </select>
			</div>
			<div class="form-row">
			<div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
		      	<label for="form_no_telp">Nomor Telepon</label>
		      	<input name="no_telp" type="text" class="form-control" id="input_no_telp" value ="{{$bpws -> no_telp}}">
		    </div>
		    <div class="form-group col-md-6" style="padding: 0;">
		      	<label for="form_no_fax">Nomor Fax</label>
		      	<input name="no_fax" type="text" class="form-control" id="input_no_fax" value ="{{$bpws -> no_fax}}">
		    </div>
			</div>
		    <div class="form-group">
		    	<label for="form_nm_pic">Nama PIC</label>
		   		<input name="nm_pic" type="text" class="form-control" id="input_nm_pic" value ="{{$bpws -> nm_pic}}">
		  	</div>
		  	<div class="form-group">
		    	<label for="form_nm_pimpinan">Nama Pimpinan</label>
		   		<input name="nm_pimpinan" type="text" class="form-control" id="input_nm_pimpinan" value ="{{$bpws -> nm_pimpinan}}">
		  	</div>
		  	<div class="form-row">
		  	<div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
			    <label for="form_jns_BPW">Jenis BPW</label>
			    <select name="jns_bpw" class="form-control" id="input_jns_bpw" value ="{{$bpws -> jns_bpw}}">
			    	<option selected>-- Pilih Jenis BPW --</option>
				    <option value="BPW">BPW</option>
				    <option value="MICE">MICE</option>
				    <option value="Lanjut Usia">Lanjut Usia</option>
			    </select>
			</div>
		    <div class="form-group col-md-6" style="padding: 0;">
			    <label for="form_sts_kantor">Status Kantor</label>
			    <select name="sts_kantor" class="form-control" id="input_sts_kantor" value ="{{$bpws -> sts_kantor}}">
			    	<option selected>-- Pilih Status Kantor --</option>
				    <option value="Hak Pribadi">Hak Pribadi</option>
				    <option value="Kontrak">Kontrak</option>
			    </select>
			</div>
			</div>
			<div class="form-group">
		      	<label for="form_nib">Nomor Induk Berusaha</label>
		      	<input name="nib" type="text" class="form-control" id="input_nib" value ="{{$bpws -> nib}}">
		    </div>
			<div class="form-group">
			    <label for="form_status">Status</label>
			    <select name="status" class="form-control" id="input_status" value ="{{$bpws -> status}}">
			    	<option selected>-- Pilih Status --</option>
				    <option value="1">Aktif</option>
				    <option value="0">Tidak Aktif</option>
			    </select>
			</div>
	
		<div>
			<button type="submit" class="btn btn-primary btn-sm">Save</button>
		</div>

	</div>
	</form>
	</div>
</div>
</section>
</form>
@endsection