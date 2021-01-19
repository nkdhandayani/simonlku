@extends('layout.master')
@section('title', 'Dashboard | Staf')
@section('topbaraccount')
@section('sidemenu')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li class="active">
        <a href="/dashboard_staf">
            <i class="fa fa-dashboard active"></i><span> Dashboard</span>
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
        <li><a href="/list_bpwStaf"><i class="fa fa-circle-o"></i><span> Data BPW</span></a></li>
        <li><a href="/list_tdupStaf')}}"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li><a href="/list_izinStaf')}}"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/list_lkuStaf')}}"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Hello,')

@section('breadcrumb')
	<li><a href="/dashboard_staf')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
@endsection

@section('content')
@endsection