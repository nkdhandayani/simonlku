@extends('layout.blank')
@section('title', 'Edit Data Pengguna | Admin')
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
    <li class="treeview">
        <a href="/dashboard_admin">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
    <li class="active treeview">
        <a href="/list_userAdmin">
            <i class="fa fa-user active"></i><span> Kelola Pengguna</span>
        </a>
    </li>
    <li class="treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola BPW</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/list_bpwAdmin"><i class="fa fa-circle-o"></i><span> Data BPW</span></a></li>
        <li><a href="/list_tdupAdmin"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li><a href="/list_izinAdmin"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/list_lkuAdmin"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Edit Data Pengguna')

@section('breadcrumb')
	<li><a href="/dashboard_admin"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
	<li class="active"> Kelola Pengguna</li>
@endsection

@section('content')
<!-- Main content -->
<form action="{{url('/editUserProsesAdmin/' .$user->id_user) }}" method="post" enctype="multipart/form-data">
	@method('patch')
	{{csrf_field()}}

<section class="content">
<div class="box">

  <!-- /.box-header -->
  <!-- form start -->
  <form role="form">
  <div class="box-body">

  <div>
    <a href="/list_userAdmin" class="btn btn-primary" style="float: right;">Kembali</a>
  </div>
  <div style="clear: both;"></div>
	<div class="form-group">
    <label for="form_foto_user">Foto Pengguna</label>
    <input name="foto_user" type="file" class="form-control-file" id="input_foto_user" value ="{{$user -> foto_user}}">
	</div>
	<div class="form-group">
    <label for="form_nm_user">Nama Pengguna</label>
   	<input name="nm_user" type="text" class="form-control" id="input_nm_user" value ="{{$user -> nm_user}}">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="form_username">Username</label>
      <input name="username" type="username" class="form-control" id="input_username" value ="{{$user -> username}}">
    </div>
    <div class="form-group col-md-6" style="padding: 0;">
      <label for="form_password">Password</label>
      <input name="password" type="password" class="form-control" id="input_password" value ="{{$user -> password}}">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
    <label for="form_nik">NIK</label>
    <input name="nik" type="text" class="form-control" id="input_nik" value ="{{$user -> nik}}">
  </div>
 	<div class="form-group col-md-6" style="padding: 0;">
   	<label for="form_Email">E-mail</label>
   	<input name="email"type="email" class="form-control" id="input_email" value ="{{$user -> email}}">
  </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="form_no_telp">Nomor Telepon</label>
      <input name="no_telp" type="text" class="form-control" id="input_no_telp" value ="{{$user -> no_telp}}">
    </div>
    <div class="form-group col-md-6" style="padding: 0;">
      <label for="form_jns_kelamin">Jenis Kelamin</label>
      <select name="jns_kelamin" class="form-control" id="input_jns_kelamin" value ="{{$user -> jns_kelamin}}">
        <option selected>-- Pilih Jenis Kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      <label for="form_level">Level</label>
      <select name="level" class="form-control" id="input_level" value ="{{$user -> level}}">
        <option selected>-- Pilih Level --</option>
        <option value="0">Administrator</option>
        <option value="1">Staf Jasa Pariwisata</option>
        <option value="2">Kepala Seksi Jasa</option>
      </select>
    </div>
    <div class="form-group col-md-6" style="padding: 0;">
      <label for="form_status">Status</label>
      <select name="status" class="form-control" id="input_status" value ="{{$user -> status}}">
        <option selected>-- Pilih Status --</option>
        <option value="1">Aktif</option>
        <option value="0">Tidak Aktif</option>
      </select>
    </div>
  </div>
	
  <div>
	  <button type="submit" class="btn btn-primary">Simpan Data Pengguna</button>
  </div>

</div>
</form>
</div>
@endsection

@section('content-footer')