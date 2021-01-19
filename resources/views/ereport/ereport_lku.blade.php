@extends('layout.blank')
@section('title', 'E-Report Laporan Kegiatan Usaha | Kepala Seksi')
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
        <a href="/dashboard_keplaa">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
    <li class="active treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> E-Report</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/ereport_bpw"><i class="fa fa-circle-o"></i> Biro Perjalanan Wisata</a></li>
        <li class="active"><a href="/ereport_lku"><i class="fa fa-circle-o"></i> Laporan Kegiatan Usaha</a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'E-Report Laporan Kegiatan Usaha')

@section('breadcrumb')
	<li><a href="/dashboard_kepala"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
	<li> E-Report</li>
	<li class="active"> Laporan Kegiatan Usaha</li>
@endsection

@section('content')
@endsection

@section('content-footer')