@extends('layout.master')
@section('title', 'Dashboard | Kepala Seksi Jasa')
@section('topbaraccount')
@section('sidemenu')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li class="active">
        <a href="/dashboard_kepala">
            <i class="fa fa-home active"></i><span> Dashboard</span>
        </a>
    </li>
    <li class="treeview">
    	<a href="#">
   		<i class="fa fa-chart"></i><span> E-Report</span>
    		<span class="pull-right-container">
    		<i class="fa fa-angle-left pull-right"></i>
    		</span>
    	</a>
    	<ul class="treeview-menu">
    		<li><a href="/ereport_bpw"><i class="fa fa-circle-o"></i> Biro Perjalanan Wisata</a></li>
    		<li><a href="/ereport_lku"><i class="fa fa-circle-o"></i> Laporan Kegiatan Usaha</a></li>
    	</ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Hello,')

@section('breadcrumb')
	<li><a href="dashboard_kepala"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
@endsection

@section('content')
@endsection