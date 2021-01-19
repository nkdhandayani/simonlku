@extends('layout.blank')
@section('title', 'Tambah Data TDUP | BPW')
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
      <a href="/list_bpwBPW')}}">
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
        <li class="active"><a href="/list_tdupBPW')}}"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li><a href="/list_izinBPW')}}"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/list_lkuBPW')}}"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Tambah Data TDUP')

@section('breadcrumb')
	<li><a href="/dashboard_bpw')}}"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
	<li> Kelola Data</li>
	<li><a href="/list_tdupBPW"><span> Data TDUP</span></a></li>
	<li class="active"> Tambah Data TDUP</li>
@endsection

@section('content')
<!-- Main content -->
<form action="{{ route('tdup.store') }}" method="post">
  {{csrf_field()}}

  <section class="content" style="padding-top: 0;">
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
      	<label for="inputNo_TDUP">Nomor TDUP</label>
      	<input name="no_tdup" type="text" class="form-control">
    </div>
    <div class="form-row">
    <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
      	<label for="input_tanggal">Tanggal TDUP</label>
      	<input name="tanggal" type="date" class="form-control">
    </div>
    <div class="form-group col-md-6" style="padding: 0px">
      	<label for="input_ms_berlaku">Masa Berlaku TDUP TDUP</label>
      	<input name="ms_berlaku" type="date" class="form-control">
    </div>
	</div>
    <div class="form-group">
    	<label for="file_tdup">File TDUP</label>
    	<input name="file_tdup" type="file" class="form-control-file">
	</div>


	<div>
	<button type="submit" class="btn btn-primary">Tambah TDUP</button>
	</div>

</div>
</form>
</div>

@endsection

@section('content-footer')