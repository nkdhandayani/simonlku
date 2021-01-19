@extends('layout.blank')
@section('title', 'Detail Data Izin Operasional | BPW')
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
        <li><a href="/list_tdupBPW"><i class="fa fa-circle-o"></i><span> Data TDUP</span></a></li>
        <li class="active"><a href="/list_izinBPW"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li><a href="/list_lkuBPW"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Edit Data Izin Operasional')

@section('breadcrumb')
  <li><a href="/dashboard_bpw"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola Data</li>
  <li><a href="/list_izinBPW"> Data Izin Operasional</li>
  <li class="active"> Detail Data Izin Operasional</li>
@endsection

@section('content')
<section class="content" style="padding-top: 0;">
  <div class="box box-primary">
        <div class="box-body">
          <table class="table">
            <!-- <tr>
              <td width="200px">Nama Biro</td>
              <td width="5px">:</td>
              <td>{{$detailBPWAdmin->nm_bpw}}</td>
            </tr> -->
            <tr> 
              <td>No. Izin Operasional</td>
              <td>:</td>
              <td>{{$detailIzinBPW->no_izin}}</td>
            </tr>
            <tr>
              <td>Tanggal Izin Operasional</td>
              <td>:</td>
              <td>{{$detailIzinBPW->tanggal}}</td>
            </tr>
            <tr>
              <td>Masa Berlaku Izin Operasional</td>
              <td>:</td>
              <td>{{$detailIzinBPW->ms_berlaku}}</td>
            </tr>
            <tr>
              <td>File Izin Operasional</td>
              <td>:</td>
              <td>{{$detailIzinBPW->file_izin}}</td>
            </tr>
            <tr>
              <td>Tanggal Ditambahkan</td>
              <td>:</td>
              <td>{{$detailIzinBPW->created_at}}</td>
            </tr>
            <tr>
              <td>Status Verifikasi</td>
              <td>:</td>
              <td>                
                <?php if($detailIzinBPW->status == 0)
                    {
                       echo "Tidak Disetujui";
                    }
                      elseif($detailIzinBPW->status == 1)
                    {
                        echo "Disetujui";
                    }
                      else
                    {
                        echo "-";
                    }                          
                    ?>
              </td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <td>{{$detailIzinBPW->keterangan}}</td>
            </tr>
            <tr>
              <td>Tanggal Verifikasi</td>
              <td>:</td>
              <td>{{$detailIzinBPW->tgl_verifikasi}}</td>
            </tr>
            <!-- <tr>
              <td>Diverifikasi oleh:</td>
              <td>:</td>
              <td>{{$detailIzinBPW->nm_user}}</td>
            </tr> -->
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <?php if($detailIzinBPW->status == 0)
                     {
                        echo "Tidak Aktif";
                     }
                      elseif($detailIzinBPW->status == 1)
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
          <a href="/list_izinBPW" class="btn btn-primary">Kembali</a>
        </div>

      </div>
        
 
</section>  
@endsection

@section('content-footer')