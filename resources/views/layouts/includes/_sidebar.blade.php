<aside class="main-sidebar">

<section class="sidebar">
    <div class="user-panel">
      <div class="pull-left user">
        @if(auth()->guard('bpw')->user() && auth()->guard('bpw')->user()->foto_bpw != null)
        <img width="45px" height="45px" src="{{ asset('avatar_bpw/' . auth()->guard('bpw')->user()->foto_bpw) }}" class="img-circle" alt="User Image"/>
        @elseif(auth()->guard('bpw')->user() && auth()->guard('bpw')->user()->foto_bpw == null)
        <img width="45px" height="45px" src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-circle" alt="User Image"/>
        @endif

        @if(auth()->guard('user')->user() && auth()->guard('user')->user()->foto_user != null)
        <img width="45px" height="45px" src="{{ asset('avatar_user/' . auth()->guard('user')->user()->foto_user) }}" class="img-circle" alt="User Image"/>
        @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->foto_user == null)
        <img width="45px" height="45px" src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-circle" alt="User Image"/>
        @endif
      </div>
        
      <div class="pull-left info">
        <p>
          @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0')
          Administrator
          @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
          Staf Jasa Pariwisata
          @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '2')
          Kepala Jasa Pariwisata
          @endif

          @if(\Auth::guard('bpw')->user())
          Biro Perjalanan Wisata
          @endif
        </p>
        <small><i class="fa fa-circle text-success"></i> Online</small>
      </div>
    </div>

<ul class="sidebar-menu">

    <li class="header">MENU UTAMA</li>   
    <li class="{{ (Request()->segment(1) == 'dashboard') ? 'active' : ''}}">
      <a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a>
    </li>

    @if(auth()->guard('bpw')->user())
    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
      <a href="/tdup"><i class="fa fa-files-o"></i> TDUP</a>
    </li>

    <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
      <a href="/izin"><i class="fa fa-files-o"></i> Izin Operasional</a>
    </li>

    <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
      <a href="/lku"><i class="fa fa-files-o"></i> LKU</a>
    </li>


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
      <a href="/bpw"><i class="fa fa-institution"></i> Biro Perjalanan Wisata</a>
    </li>

    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
      <a href="/tdup"><i class="fa fa-files-o"></i> TDUP</a>
    </li>

    <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
      <a href="/izin"><i class="fa fa-files-o"></i> Izin Operasional</a>
    </li>

    <li class="treeview {{ (Request()->segment(1) == 'lku') ? 'active' : ''}} || {{ (Request()->segment(1) == 'monitoring_lku') ? 'active' : ''}}">
      <a href="#"><i class="fa fa-files-o"></i> Laporan Kegiatan Usaha<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}"><a href="/lku"><i class="fa fa-circle-o"></i> Pengumpulan LKU</a></li>
        <li class="{{ (Request()->segment(1) == 'monitoring_lku') ? 'active' : ''}}"><a href="/monitoring_lku"><i class="fa fa-circle-o"></i> Monitoring LKU</a></li>
      </ul>
    </li> 


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
    <li class="header">KELOLA DATA PENGGUNA</li>
    <li class="{{ (Request()->segment(1) == 'user') ? 'active' : ''}}">
        <a href="/user"><i class="fa fa-user"></i> Pegawai Jasa Pariwisata</a>
    </li>
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
        <a href="/bpw"><i class="fa fa-institution"></i> Biro Perjalanan Wisata</a>
    </li>

    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
      <a href="/tdup"><i class="fa fa-files-o"></i> TDUP</a>
    </li>

    <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
      <a href="/izin"><i class="fa fa-files-o"></i> Izin Operasional</a>
    </li>

    <li class="treeview {{ (Request()->segment(1) == 'lku') ? 'active' : ''}} || {{ (Request()->segment(1) == 'monitoring_lku') ? 'active' : ''}}">
      <a href="#">
        <i class="fa fa-files-o"></i> Laporan Kegiatan Usaha
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        
      </a>
      <ul class="treeview-menu">
        <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}"><a href="/lku"><i class="fa fa-circle-o"></i> Pengumpulan LKU</a></li>
        <li class="{{ (Request()->segment(1) == 'monitoring_lku') ? 'active' : ''}}"><a href="/monitoring_lku"><i class="fa fa-circle-o"></i> Monitoring LKU</a></li>
      </ul>
    </li>


    @elseif(auth()->guard('user')->user()->level == 2)
    <li class="header">E-REPORT</li>
    <li class="{{ (Request()->segment(1) == 'ereport_bpw') ? 'active' : ''}}">
      <a href="/ereport_bpw"><i class="fa fa-bar-chart-o"></i> Biro Perjanan Wisata</a>
    </li>

    <li class="{{ (Request()->segment(1) == 'ereport_lku') ? 'active' : ''}}">
      <a href="/ereport_lku"><i class="fa fa-line-chart"></i> Laporan Kegiatan Usaha</a>
    </li>
    @endif

</ul>
</section>

</aside>