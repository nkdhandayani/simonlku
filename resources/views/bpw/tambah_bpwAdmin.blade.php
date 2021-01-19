@extends('layout.blank')
@section('title', 'Tambah Data Biro | Admin')
@section('topbaraccount')
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
        <span class="hidden-xs">Alexander Pierce</span>
    </a>

    <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
        <img src="{{url('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        <p>
        Alexander Pierce - Web Developer
        <small>Member since Nov. 2012</small>
        </p>
    </li>
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="#" class="btn btn-default btn-flat">Log out</a>
      </div>
    </li>
    </ul>
</li>
@endsection

@section('sidemenu')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li>
        <a href="/dashboard_admin">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
    <li>
        <a href="/list_userAdmin">
            <i class="fa fa-user"></i><span> Kelola Pengguna</span>
        </a>
    </li>
    <li class="active treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola BPW</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="/list_bpwAdmin"><i class="fa fa-circle-o"></i> Data BPW</a></li>
        <li><a href="/list_tdupAdmin"><i class="fa fa-circle-o"></i> Data TDUP</a></li>
        <li><a href="/list_izinAdmin"><i class="fa fa-circle-o"></i> Data Izin Operasional</a></li>
        <li><a href="/list_lkuAdmin"><i class="fa fa-circle-o"></i> Data LKU</a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Tambah Data Biro Perjalanan Wisata')

@section('breadcrumb')
	<li><a href="/dashboard_admin"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
	<li> Kelola BPW</li>
	<li><a href="/list_bpwAdmin"><span> Data BPW</span></a></li>
	<li class="active"> Tambah Data Biro</li>
@endsection

@section('content')
<!-- Main content -->
<form action="{{ route('bpw.store') }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}

	<section class="content" style="padding-top: 0;">
	    <div class="box">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
            <div class="box-body">
            
            <div>
    			<a href="/list_bpwAdmin" class="btn btn-primary" style="float: right;">Kembali</a>
  			</div>
  			<div style="clear: both;"></div>
            <div class="form-group">
		    	<label for="form_nm_bpw">Nama BPW</label>
		   		<input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw">
		  	</div>
		  	<div class="form-row">
		    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
		      	<label for="form_username">Username</label>
		      	<input name="username" type="username" class="form-control" id="input_username">
		    </div>
		    <div class="form-group col-md-6" style="padding: 0px;">
		      	<label for="form_password">Password</label>
		      	<input name="password" type="password" class="form-control" id="input_password">
		    </div>
		  	</div>
		  	<div class="form-group">
		      	<label for="form_Email">E-mail</label>
		      	<input name="email"type="email" class="form-control" id="input_email">
			</div>
		  	<div class="form-group">
			    <label for="for_alamat">Alamat</label>
			    <textarea name="alamat" type="textarea" class="form-control" id="input_alamat" rows="6"></textarea>
		  	</div>
			<div class="form-group">
			    <label for="form_kabupaten">Kabupaten/Kota</label>
			    <select name="kabupaten" class="form-control" id="input_kabupaten">
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
		      	<input name="no_telp" type="text" class="form-control" id="input_no_telp">
		    </div>
		    <div class="form-group col-md-6" style="padding: 0;">
		      	<label for="form_no_fax">Nomor Fax</label>
		      	<input name="no_fax" type="text" class="form-control" id="input_no_fax">
		    </div>
			</div>
		    <div class="form-group">
		    	<label for="form_nm_pic">Nama PIC</label>
		   		<input name="nm_pic" type="text" class="form-control" id="input_nm_pic">
		  	</div>
		  	<div class="form-group">
		    	<label for="form_nm_pimpinan">Nama Pimpinan</label>
		   		<input name="nm_pimpinan" type="text" class="form-control" id="input_nm_pimpinan">
		  	</div>
		  	<div class="form-row">
		  	<div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
			    <label for="form_jns_BPW">Jenis BPW</label>
			    <select name="jns_bpw" class="form-control" id="input_jns_bpw">
			    	<option selected>-- Pilih Jenis BPW --</option>
				    <option value="BPW">BPW</option>
				    <option value="MICE">MICE</option>
				    <option value="Lanjut Usia">Lanjut Usia</option>
			    </select>
			</div>
		    <div class="form-group  col-md-6" style="padding: 0;">
			    <label for="form_sts_kantor">Status Kantor</label>
			    <select name="sts_kantor" class="form-control" id="input_sts_kantor">
			    	<option selected>-- Pilih Status Kantor --</option>
				    <option value="Hak Pribadi">Hak Pribadi</option>
				    <option value="Kontrak">Kontrak</option>
			    </select>
			</div>
			</div>
			<div class="form-group">
		      	<label for="form_nib">Nomor Induk Berusaha</label>
		      	<input name="nib" type="text" class="form-control" id="input_nib">
		    </div>
		    <div class="form-group">
		    	<label for="form_foto_bpw">Foto BPW</label>
		    	<input name="foto_bpw" type="file" class="form-control-file" id="input_foto_bpw">
			</div>
			<div class="form-group">
			    <label for="form_status">Status</label>
			    <select name="status" class="form-control" id="input_status">
			    	<option selected>-- Pilih Status --</option>
				    <option value="1">Aktif</option>
				    <option value="0">Tidak Aktif</option>
			    </select>
			</div>

		<div>
			<button type="submit" class="btn btn-primary">Tambah Biro</button>
		</div>
	</div>
    </form>
</div>
@endsection

@section('content-footer')