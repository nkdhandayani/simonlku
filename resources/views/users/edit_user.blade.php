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

	  <form role="form">
	  <div class="box-body pad table-responsive">

	  	<div>
	  	  <button type="button" class="close" aria-label="Close"><a href="/user">
      	      <span aria-hidden="true">&times;</span></a>
      	  </button>
	  	</div>
	  	<br><br>
	  		
		<div class="form-row">
		<div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
	    <label for="form_nm_user">Nama Pengguna</label>
	   	<input name="nm_user" type="text" class="form-control" id="input_nm_user" value ="{{$users -> nm_user}}" required="required" autocomplete="off">
	    </div>
	    <div class="form-group col-md-6" style="padding: 0">
	        <label for="form_username">Username</label>
		    <input name="username" type="username" class="form-control" id="input_username" value ="{{$users -> username}}" required="required" autocomplete="off">
		</div>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
		    <label for="form_nik">NIK</label>
		    <input name="nik" type="text" class="form-control" id="input_nik" value ="{{$users -> nik}}" required="required" autocomplete="off">
		</div>
		<div class="form-group col-md-6" style="padding: 0;">
		   	<label for="form_Email">E-mail</label>
		   	<input name="email"type="email" class="form-control" id="input_email" value ="{{$users -> email}}" required="required" autocomplete="off">
		</div>
		</div>

	  	<div class="form-row">
	    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
	        <label for="form_no_telp">Nomor Telepon</label>
	      	<input name="no_telp" type="text" class="form-control" id="input_no_telp" value ="{{$users -> no_telp}}" required="required" autocomplete="off">
	    </div>
	    <div class="form-group col-md-6" style="padding: 0;">
	      	<label for="form_jns_kelamin">Jenis Kelamin</label>
	      		<select name="jns_kelamin" class="form-control" id="input_jns_kelamin" value ="{{$users -> jns_kelamin}}" required="required" autocomplete="off">
	        	<option selected disabled="">-- Pilih Jenis Kelamin --</option>
	        	<option value="Laki-laki" @if($users -> jns_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
	        	<option value="Perempuan" @if($users -> jns_kelamin == "Perempuan") selected @endif>Perempuan</option>
	      		</select>
	    </div>
	  	</div>

	  	<div class="form-row">
	    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
	    	<label for="form_level">Level</label>
	      		<select name="level" class="form-control" id="input_level" value ="{{$users -> level}}" required="required" autocomplete="off">
	        	<option selected disabled="">-- Pilih Level --</option>
	        	<option value="0" @if($users -> level == "0") selected @endif>Administrator</option>
	        	<option value="1" @if($users -> level == "1") selected @endif>Staf Jasa Pariwisata</option>
	        	<option value="2" @if($users -> level == "2") selected @endif>Kepala Seksi Jasa</option>
	      		</select>
	    </div>
	    <div class="form-group col-md-6" style="padding: 0;">
	      	<label for="form_status">Status</label>
	      		<select name="status" class="form-control" id="input_status" value ="{{$users -> status}}" required="required" autocomplete="off">
		        <option selected disabled="">-- Pilih Status --</option>
		        <option value="1" @if($users -> status == "1") selected @endif>Aktif</option>
	    	    <option value="0" @if($users -> status == "0") selected @endif>Tidak Aktif</option>
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