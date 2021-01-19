<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<title>Tambah Data Pengguna</title>
</head>
<body>

<form action="{{ route('users.store') }}" method="post">
	{{csrf_field()}}

  	<div class="form-row col-md-6">
    <div class="form-group col-md-6">
      	<label for="form_sername">Username</label>
      	<input name="username" type="username" class="form-control" id="input_username">
    </div>
    <div class="form-group col-md-6">
      	<label for="form_assword">Password</label>
      	<input name="password" type="password" class="form-control" id="input_password">
    </div>
    </div>
	<div class="form-group col-md-6">
    	<label for="form_nm_user">Nama Pengguna</label>
   		<input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw">
  	</div>
  	<div class="form-group col-md-6">
      	<label for="form_nik">Nomor Induk Kependudukan</label>
      	<input name="nik" type="number" class="form-control" id="input_nik">
    </div>
  	<div class="form-group col-md-6">
      	<label for="form_Email">E-mail</label>
      	<input name="email"type="email" class="form-control" id="input_email">
	</div>
	<div class="form-group col-md-6">
      	<label for="form_no_telp">Nomor Telepon</label>
      	<input name="no_telp" type="text" class="form-control" id="input_no_telp">
    </div>
    <div class="form-group col-md-6">
	    <label for="form_jns_kelamin">Jenis Kelamin</label>
	    <select name="jns_kelamin" class="form-control" id="input_jns_kelamin">
	    	<option selected>Pilih Jenis Kelamin</option>
		    <option value="Laki-laki">Laki-laki</option>
		    <option value="Perempuan">Perempuan</option>
	    </select>
	</div>
    <div class="form-group col-md-6">
    	<label for="form_foto_user">Foto Pengguna</label>
    	<input name="foto_user" type="file" class="form-control-file" id="input_foto_user">
	</div>
	<div class="form-row col-md-6">
	<div class="form-group col-md-6">
	    <label for="form_level">Level Pengguna</label>
	    <select name="level" class="form-control" id="input_level">
	    	<option selected>Pilih Level Pengguna</option>
		    <option value="1">Staf Jasa Pariwisata</option>
		    <option value="2">Kepala Seksi</option>
	    </select>
	</div>
	<div class="form-group col-md-6">
	    <label for="form_status">Status</label>
	    <select name="status" class="form-control" id="input_status">
	    	<option selected>Pilih Status</option>
		    <option value="1">Aktif</option>
		    <option value="0">Tidak Aktif</option>
	    </select>
	</div>
	</div>

<div>
	<button type="submit" class="btn btn-primary" style="margin-left: 15px; margin-top: 10px">Tambah Data BPWr</button>
</div>

</form>

</body>
</html>