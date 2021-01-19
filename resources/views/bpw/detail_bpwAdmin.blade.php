@extends('layout.blank')
@section('title', 'Detail Biro Perjalanan Wisata | Admin')
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
      <a href="/dashboard_admin">
        <i class="fa fa-home"></i><span> Dashboard</span>
      </a>
    </li>
    <li>
      <a href="/list_userAdmin">
        <i class="fa fa-user"></i><span> Kelola Pengguna</span>
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
        <li class="active"><a href="/list_bpwAdmin"><i class="fa fa-circle-o"></i> Data BPW</a></li>
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

@section('content-title', 'Detail Biro Perjalanan Wisata')

@section('breadcrumb')
  <li><a href="/dashboard_admin"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola BPW</li>
  <li><a href="/list_bpwAdmin"> Data BPW</a></li>
  <li class="active"> Detail BPW</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;">
	<div class="box box-primary">
        <div class="box-body">
          <table class="table">
            <tr>
              <td width="200px">Foto</td>
              <td width="5px">:</td>
              <td>{{$detailBPWAdmin->foto_bpw}}</td>
            </tr>
            <tr> 
              <td>Nama Biro</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->nm_bpw}}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->username}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->email}}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->alamat}}</td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->kabupaten}}</td>
            </tr>
            <tr>
              <td>No. Telp</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->no_telp}}</td>
            </tr>
            <tr>
              <td>No. Fax</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->no_fax}}</td>
            </tr>
            <tr>
              <td>Nama PIC</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->nm_pic}}</td>
            </tr>
            <tr>
              <td>Nama Pimpinan</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->nm_pimpinan}}</td>
            </tr>
            <tr>
              <td>Jenis BPW</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->jns_bpw}}</td>
            </tr>
            <tr>
              <td>Status Kantor</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->sts_kantor}}</td>
            </tr>
            <tr>
              <td>NIB</td>
              <td>:</td>
              <td>{{$detailBPWAdmin->nib}}</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <?php if($detailBPWAdmin->status == 0)
                     {
                        echo "Tidak Aktif";
                     }
                      elseif($detailBPWAdmin->status == 1)
                    {
                        echo "Aktif";
                    }
                      else
                    {
                        echo "-";
                    }                          
                    ?>            
              </td>    
            </tr>
           </table> 
           
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <a href="/list_bpwAdmin" class="btn btn-primary">Kembali</a>
        </div>

      </div>
				
 
</section>	
@endsection

@section('content-footer')