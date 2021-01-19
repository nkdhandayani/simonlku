@extends('layout.blank')
@section('title', 'Detail Laporan Kegiatan | BPW')
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
        <li><a href="/list_izinBPW"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a></li>
        <li class="active"><a href="/list_lkuBPW"><i class="fa fa-circle-o"></i><span> Data LKU</span></a></li>
      </ul>
    </li>
</ul>
</section>

<!-- sidebar: style can be found in sidebar.less -->
</aside>
@endsection

@section('content-title', 'Detail Laporan Kegiatan Usaha')

@section('breadcrumb')
  <li><a href="/dashboard_bpw"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
  <li> Kelola Data</li>
  <li><a href="/list_lkuBPW"><span> Data LKU</span></a></li>
  <li class="active"> Detail Laporan Kegiatan Usaha</li>
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
              <td>No. Surat Pengantar</td>
              <td>:</td>
              <td>{{$detailLKUBPW->no_surat}}</td>
            </tr>
            <tr>
              <td>Tahun</td>
              <td>:</td>
              <td>{{$detailLKUBPW->tahun}}</td>
            </tr>
            <tr>
              <td>Periode</td>
              <td>:</td>
              <td>
                <?php if($detailLKUBPW->periode == I)
                    {
                       echo "I";
                    }
                      elseif($detailLKUBPW->periode == II)
                    {
                        echo "II";
                    }
                      else
                    {
                        echo "-";
                    }                          
                ?>
              </td>
            </tr>
            <tr>
              <td>File Laporan Kegiatan Usaha</td>
              <td>:</td>
              <td>{{$detailLKUBPW->file_lku}}</td>
            </tr>
            <!-- <tr>
              <td>Status TDUP</td>
              <td>:</td>
              <td>                
                <?php if($detailTDUPBPW->status == 0)
                    {
                       echo "Tidak Disetujui";
                    }
                      elseif($detailTDUPBPW->status == 1)
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
              <td>Status Izin Operasional</td>
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
            </tr> -->
            <tr>
              <td>Tanggal Ditambahkan</td>
              <td>:</td>
              <td>{{$detailLKUBPW->created_at}}</td>
            </tr>
            <tr>
              <td>Status Verifikasi</td>
              <td>:</td>
              <td>                
                <?php if($detailLKUBPW->status == 0)
                    {
                       echo "Tidak Disetujui";
                    }
                      elseif($detailLKUBPW->status == 1)
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
              <td>{{$detailLKUBPW->keterangan}}</td>
            </tr>
            <tr>
              <td>Tanggal Verifikasi</td>
              <td>:</td>
              <td>{{$detailLKUBPW->tgl_verifikasi}}</td>
            </tr>
            <!-- <tr>
              <td>Diverifikasi oleh:</td>
              <td>:</td>
              <td>{{$detailLKUBPW->nm_user}}</td>
            </tr> -->
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <?php if($detailLKUBPW->status == 0)
                     {
                        echo "Tidak Aktif";
                     }
                      elseif($detailLKUBPW->status == 1)
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
          <a href="/list_lkuBPW" class="btn btn-primary">Kembali</a>
        </div>

      </div>
        
 
</section>  
@endsection

@section('content-footer')