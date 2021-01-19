@extends('layout.blank')
@section('title', 'Data Izin Operasional | Staf')
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
        <li><a href="/list_tdupStaf"><i class="fa fa-circle-o"></i> Data TDUP</a></li>
        <li class="active"><a href="/list_izinStaf"><i class="fa fa-circle-o"></i> Data Izin Operasional</a></li>
        <li><a href="/list_lkuStaf"><i class="fa fa-circle-o"></i> Data LKU</a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Data Izin Operasional')

@section('breadcrumb')
  <li><a href="/dashboard_staf"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola BPW</li>
  <li class="active"> Data Izin Operasional</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
  
      <div class="box-body">
        <table id='listusers' class="table table-bordered table-striped">
          <thead>
            <th>No.</th>
            <th>No. Izin Operasional</th>
            <th>Masa Berlaku</th>
            <th>File Izin Operasional</th>
            <th>Status Verifikasi</th>
            <th>Status</th>
            <th style="text-align: center;">Aksi</th>
          </thead>
          <tbody>
            @php
              $i=1;
            @endphp
            @foreach ($izinz as $izin)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $izin->no_izin }}</td>
                <td>{{ $izin->ms_berlaku }}</td>
                <td>{{ $izin->file_izin }}</td>
                <td>{{ $izin->sts_verifikasi }}</td>
                <td>{{ $izin->status }}</td>
                <td style="text-align: center;">
                  <a href="{{url('detail_izinStaf', $izin -> id_izin)}}" class="btn btn-primary">View</a>
                  <a href="/edit_izinStaf/edit/{{ $izin->id_izin }}" class="btn btn-primary">Edit</a>
                </td>
              </tr>
                @php
                  $i++;
                @endphp
             @endforeach
          </tbody>
        </table>
      </div>
    <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection

@section('content-footer')