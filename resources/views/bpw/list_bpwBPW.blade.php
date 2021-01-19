@extends('layout.blank')
@section('title', 'Data Biro Perjalanan Wisata | BPW')
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
      <a href="/dashboard_bpw">
        <i class="fa fa-dashboard"></i><span> Dashboard</span>
      </a>
    </li>
    <li class="active">
      <a href="/list_bpwBPW">
        <i class="fa fa-list-alt"></i><span> Biro Perjalanan Wisata</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
      <i class="fa fa-edit"></i><span> Kelola Data</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/list_tdupBPW"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li><a href="/list_izinBPW"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/list_lkuBPW"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Data Biro Perjalanan Wisata')

@section('breadcrumb')
  <li><a href="/dashboard_bpw"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li class="active"> Biro Perjalanan Wisata</li>
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
            <th>Foto</th>
            <th>Nama BPW</th>
            <th>Kabupaten</th>
            <th>Email</th>
            <th>No. Telp</th>
            <th>Nama Pimpinan</th>
            <th>Status</th>
          </thead>
        <tbody>
            @php
              $i=1;
            @endphp
            @foreach ($bpws as $bpw)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $bpw->foto_bpw }}</td>
                <td>{{ $bpw->nm_bpw }}</td>
                <td>{{ $bpw->kabupaten }}</td>
                <td>{{ $bpw->email }}</td>
                <td>{{ $bpw->no_telp }}</td>
                <td>{{ $bpw->nm_pimpinan }}</td>
                <td>
                <?php if($bpw->status == 0)
                {
                  echo "Tidak Aktif";
                }
                  elseif($bpw->status == 1)
                {
                  echo "Aktif";
                }
                else
                {
                  echo "Tidak Aktif";
                }
                ?>
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