@extends ('layout.blank')
@section('title', 'Detail Data Pengguna | Admin')
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
        <a href="/layout/dashboard_admin">
            <i class="fa fa-home"></i><span> Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="/users/list_userAdmin">
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
        <li><a href="/bpw/list_bpwAdmin"><i class="fa fa-circle-o"></i><span> Data BPW</span></a></li>
        <li><a href="/tdup/list_tdupAdmin"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li><a href="/izin/list_izinAdmin"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/lku/list_lkuAdmin"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Detail Data Pengguna')

@section('breadcrumb')
  <li><a href="/dashboard_admin"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola Pengguna</li>
  <li class="active"> Detail Pengguna</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;">
	<div class="box box-primary">
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">Foto</td>
              <td width="5px">:</td>
              <td>{{$detailUserAdmin->foto_user}}</td>
            </tr>
            <tr> 
              <td>Nama Pengguna</td>
              <td>:</td>
              <td>{{$detailUserAdmin->nm_user}}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>:</td>
              <td>{{$detailUserAdmin->username}}</td>
            </tr>
            <tr>
              <td>NIK</td>
              <td>:</td>
              <td>{{$detailUserAdmin->nik}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>{{$detailUserAdmin->email}}</td>
            </tr>
            <tr>
              <td>No. Telp</td>
              <td>:</td>
              <td>{{$detailUserAdmin->no_telp}}</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>{{$detailUserAdmin->jns_kelamin}}</td>
            </tr> 
            <tr>           
            <td>Level</td>
            <td>:</td>
            <td><?php
                  if($detailUserAdmin->level == 0)
                    {
                      echo "Administrator";
                    }
                  elseif($detailUserAdmin->level == 1)
                    {
                      echo "Staf Jasa Pariwisata";
                    }
                  elseif($detailUserAdmin->level == 2)
                    {
                      echo "Kepala Seksi Jasa Pariwisata";
                    }
                  else
                    {
                      echo "Non Aktif";
                    }                          
                ?>
            </td>
            </tr>
            <tr>
            <td>Status</td>
            <td>:</td>
            <td><?php
                  if($detailUserAdmin->status == 0)
                    {
                      echo "Tidak Aktif";
                    }
                  elseif($detailUserAdmin->status == 1)
                    {
                      echo "Aktif";
                    }
                  else
                    {
                      echo "Non Aktif";
                    }                          
                ?>            
            </td>    
            </tr>
           </table> 
           
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <a href="/list_userAdmin" class="btn btn-primary">Kembali</a>
        </div>

      </div>
				
 
</section>	
@endsection

@section('content-footer')