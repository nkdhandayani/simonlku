@extends('layout.blank')
@section('title', 'Edit TDUP | Staf')
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
      <a href="/dashboard_staf">
        <i class="fa fa-home"></i><span> Dashboard</span>
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
        <li><a href="/list_bpwStaf"><i class="fa fa-circle-o"></i> Data BPW</a></li>
        <li class="active"><a href="/list_tdupStaf"><i class="fa fa-circle-o"></i> Data TDUP</a></li>
        <li><a href="/list_izinStaf"><i class="fa fa-circle-o"></i> Data Izin Operasional</a></li>
        <li><a href="/list_lkuStaf"><i class="fa fa-circle-o"></i> Data LKU</a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Edit Data TDUP')

@section('breadcrumb')
  <li><a href="/dashboard_staf"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola BPW</li>
  <li> Data TDUP</li>
  <li class="active"> Edit Data TDUP</li>
@endsection

@section('content')
<!-- Main content -->
<form action="{{url('/editTDUPProsesStaf/' .$tdup->id_tdup) }}" method="post">
  {{csrf_field()}}

  <section class="content">
  <div class="box">

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">

  <div>
    <a href="/list_izinStaf" class="btn btn-primary" style="float: right;">Kembali</a>
  </div>
  <div style="clear: both;"></div>
	<!-- <div class="form-group col-md-6">
    	<label for="form_nm_bpw">Nama BPW</label>
   		<input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw">
  	</div> -->
	<div class="form-group col-md-6">
      	<label for="inputNo_TDUP">Nomor TDUP</label>
      	<input name="no_tdup" type="text" class="form-control">
    </div>
    <div class="form-row col-md-6">
    <div class="form-group col-md-6">
      	<label for="input_tanggal">Tanggal TDUP</label>
      	<input name="tanggal" type="date" class="form-control">
    </div>
    <div class="form-group col-md-6">
      	<label for="input_ms_berlaku">Masa Berlaku TDUP</label>
      	<input name="ms_berlaku" type="date" class="form-control">
    </div>
	</div>
    <div class="form-group col-md-6">
    	<label for="file_tdup">File TDUP</label>
    	<input name="file_tdup" type="file" class="form-control-file">
	</div>
  <!-- <div class="form-group col-md-6">
        <label for="input_tanggal_tambah">Tanggal Ditambahkan</label>
        <input name="created_at" type="date" class="form-control">
  </div> -->
	<div class="form-group col-md-6">
	    <label for="status">Status Verifikasi</label>
	    <select name="sts_verifikasi" class="form-control">
			<option selected>-- Pilih Status Verifikasi --</option>
		    <option value="1">Diterima</option>
		    <option value="0">Tidak Diterima</option>
	    </select>
	</div>
	<div class="form-group col-md-6">
	    <label for="inputKeterangan">Keterangan</label>
	    <textarea name="keterangan" class="form-control" rows="6"></textarea>
  	</div>
  	<div class="form-group col-md-6">
      	<label for="input_tgl_verifikasi">Tanggal Verifikasi</label>
      	<input name="tgl_verifikasi" type="date" class="form-control">
    </div>
    <!-- <div class="form-group col-md-6">
    	<label for="form_nm_staf">Diverifikasi Oleh</label>
   		<input name="nm_user" type="text" class="form-control" id="input_nm_user" value ="{{$user -> nm_user}}">
  	</div> -->
    <div class="form-group col-md-6">
	    <label for="status">Status</label>
	    <select name="status" class="form-control">
	    	<option selected>-- Pilih Status --</option>
		    <option value="1">Aktif</option>
		    <option value="0">Tidak Aktif</option>
	    </select>
	</div>
	
	<div>
	<button type="submit" class="btn btn-primary" style="margin-top: 10px">Simpan TDUP</button>
	</div>

</div>
</form>
</div>

@endsection

@section('content-footer')