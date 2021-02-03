@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Data Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/user"></i> Kelola Pengguna</a></li>
        <li class="active"><a href="#"></i> Edit Pengguna</a></li>
      </ol>
    </section>

	<form action="/user/update/{{ $users->id_user }}" method="post" enctype="multipart/form-data">
		@method('patch')
		{{csrf_field()}}

	<section class="content">
	<div class="box box-primary">

	  <!-- /.box-header -->
	  <!-- form start -->
	  <form role="form">
	  <div class="box-body pad table-responsive">

	  <div>
	    <a href="/user" class="btn btn-primary btn-sm" style="float: right;">Back</a>
	  </div>
	  <div style="clear: both;"></div>
		

		<div class="form-group">
	    <label for="form_foto_user">Foto Pengguna</label>
	    <input name="foto_user" type="file" class="form-control-file" id="input_foto_user" value ="{{$users -> foto_user}}">
		</div>

		<div class="form-group">
	    <label for="form_nm_user">Nama Pengguna</label>
	   	<input name="nm_user" type="text" class="form-control" id="input_nm_user" value ="{{$users -> nm_user}}">
	    </div>

		<div class="form-row">
	    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
	        <label for="form_username">Username</label>
		    <input name="username" type="username" class="form-control" id="input_username" value ="{{$users -> username}}">
		</div>
		<div class="form-group col-md-6" style="padding: 0;">
		    <label for="form_password">Password</label>
		    <input name="password" type="password" class="form-control" id="input_password" value ="{{$users -> password}}">
		</div>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
		    <label for="form_nik">NIK</label>
		    <input name="nik" type="text" class="form-control" id="input_nik" value ="{{$users -> nik}}">
		</div>
		<div class="form-group col-md-6" style="padding: 0;">
		   	<label for="form_Email">E-mail</label>
		   	<input name="email"type="email" class="form-control" id="input_email" value ="{{$users -> email}}">
		</div>
		</div>

	  	<div class="form-row">
	    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
	        <label for="form_no_telp">Nomor Telepon</label>
	      	<input name="no_telp" type="text" class="form-control" id="input_no_telp" value ="{{$users -> no_telp}}">
	    </div>
	    <div class="form-group col-md-6" style="padding: 0;">
	      	<label for="form_jns_kelamin">Jenis Kelamin</label>
	      		<select name="jns_kelamin" class="form-control" id="input_jns_kelamin" value ="{{$users -> jns_kelamin}}">
	        	<option selected>-- Pilih Jenis Kelamin --</option>
	        	<option value="Laki-laki">Laki-laki</option>
	        	<option value="Perempuan">Perempuan</option>
	      		</select>
	    </div>
	  	</div>

	  	<div class="form-row">
	    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
	    	<label for="form_level">Level</label>
	      		<select name="level" class="form-control" id="input_level" value ="{{$users -> level}}">
	        	<option selected>-- Pilih Level --</option>
	        	<option value="0">Administrator</option>
	        	<option value="1">Staf Jasa Pariwisata</option>
	        	<option value="2">Kepala Seksi Jasa</option>
	      		</select>
	    </div>
	    <div class="form-group col-md-6" style="padding: 0;">
	      	<label for="form_status">Status</label>
	      		<select name="status" class="form-control" id="input_status" value ="{{$users -> status}}">
		        <option selected>-- Pilih Status --</option>
		        <option value="1">Aktif</option>
	    	    <option value="0">Tidak Aktif</option>
	      		</select>
	    </div>
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