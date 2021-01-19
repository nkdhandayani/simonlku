@extends('layout.blank')
@section('title', 'Edit TDUP | BPW')
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
      <a href="/dashboard_bpw')}}">
        <i class="fa fa-dashboard"></i><span> Dashboard</span>
      </a>
    </li>
    <li>
      <a href="/list_bpwBPW">
        <i class="fa fa-list-alt"></i><span> Biro Perjalanan Wisata</span>
      </a>
    </li>
    <li class="active treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola Data</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="/list_tdupBPW"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li><a href="/list_izinBPW"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/list_lkuBPW"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Edit Data TDUP')

@section('breadcrumb')
  <li><a href="/dashboard_bpw"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola Data</li>
  <li> Data TDUP</li>
  <li class="active"> Edit Data TDUP</li>
@endsection

@section('content')
<!-- Main content -->
<form action="{{url('/editTDUPProsesBPW/' .$tdup->id_tdup) }}" method="post">
  {{csrf_field()}}

  <section class="content" style="padding-top: 0px;">
  <div class="box">

    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
    <div class="box-body">

  <div>
    <a href="/list_tdupBPW" class="btn btn-primary" style="float: right;">Kembali</a>
  </div>
  <div style="clear: both;"></div>

  <div class="form-group">
      <label for="form_nm_bpw">Nama Biro Perjalanan Wisata</label>
      <input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw" value ="{{$bpw -> nm_bpw}}">
  </div>
  <div class="form-group">
      <label for="form_no_tdup">Nomor TDUP</label>
      <input name="no_tdup" type="text" class="form-control" id="input_no_tdup" value ="{{$tdup -> no_tdup}}">
  </div>
  <div class="form-group">
      <label for="form_no_tdup">Nomor TDUP</label>
      <input name="no_tdup" type="text" class="form-control" id="input_no_tdup" value ="{{$tdup -> no_tdup}}">
  </div>
  <div class="form-group">
      <label for="form_tgl_tdup">Tanggal TDUP</label>
      <input name="tanggal" type="text" class="form-control" id="input_tdl_tdup" value ="{{$tdup -> tanggal}}">
  </div>
  <div class="form-group">
      <label for="form_ms_tdup">Masa Berlaku TDUP</label>
      <input name="ms_tdup" type="text" class="form-control" id="input_ms_tdup" value ="{{$tdup -> ms_tdup}}">
  </div>
  <div class="form-group">
      <label for="form_file_tdup">File TDUP</label>
      <input name="file_tdup" type="text" class="form-control-file" id="input_file_tdup" value ="{{$tdup -> file_tdup}}">
  </div>
  <div class="form-group">
      <label for="form_tgl_tambah">Tanggal Ditambahkan</label>
      <input name="created_at" type="text" class="form-control" id="input_tgl_tambah" value ="{{$tdup -> created_at}}">
  </div>
  <div class="form-group">
      <label for="form_sts_verifikasi">Status Verifikasi</label>
      <select name="sts_verifikasi" class="form-control" id="input_sts_verifikasi" value ="{{$tdup -> sts_verifikasi}}">
        <option selected>-- Pilih Status Verifikasi --</option>
        <option value="1">Disetujui</option>
        <option value="0">Tidak Disetujui</option>
      </select>
  </div>
  <div class="form-group">
      <label for="form_keterangan">Keterangan</label>
      <input name="keterangan" type="text" class="form-control" id="input_keterangan" value ="{{$tdup -> keterangan}}">
  </div>
  <div class="form-group">
      <label for="form_tgl_verifikasi">Tanggal Verifikasi</label>
      <input name="tgl_verifikasi" type="text" class="form-control" id="input_tgl_verifikasi" value ="{{$tdup -> tgl_verifikasi}}">
  </div>
<!--   <div class="form-group">
      <label for="form_nm_verifikator">Diverifikasi Oleh</label>
      <input name="nm_user" type="text" class="form-control" id="input_nm_user" value ="">
  </div> -->
  <div class="form-group">
      <label for="form_status">Status</label>
      <select name="status" class="form-control" id="input_status" value ="{{$tdup -> status}}">
        <option selected>-- Pilih Status --</option>
        <option value="1">Aktif</option>
        <option value="0">Tidak Aktif</option>
      </select>
  </div>

	<div>
	<button type="submit" class="btn btn-primary">Simpan TDUP</button>
	</div>

</div>
</form>
</div>

@endsection

@section('content-footer')