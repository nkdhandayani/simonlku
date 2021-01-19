@extends('layout.master')
@section('title', 'Dashboard | Admin')
@section('topbaraccount')
@section('sidemenu')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li class="active">
        <a href="/dashboard_admin">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
    <li>
        <a href="/list_userAdmin">
            <i class="fa fa-user"></i><span> Kelola Pengguna</span>
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
    		<li><a href="/list_bpwAdmin"><i class="fa fa-circle-o"></i> Data BPW</a></li>
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

@section('content-title', 'Hello,')

@section('breadcrumb')
	<li><a href="/dashboard_admin"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
@endsection

@section('content')
@endsection