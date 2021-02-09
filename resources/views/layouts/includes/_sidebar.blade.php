<aside class="main-sidebar">

<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('adminLTE/dist/img/user.png')}}" class="img-circle" alt="User Image">
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
      <a href="/dashboard"><i class="fa fa-home"></i><span> Dashboard</span></a>
    </li>

    @if(auth()->guard('bpw')->user() || auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
      <a href="/bpw"><i class="fa fa-institution"></i><span>Biro Perjalanan Wisata</span></a>
    </li>

    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
      <a href="/tdup"><i class="fa fa-files-o"></i><span> TDUP</span></a>
    </li>

    <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
      <a href="/izin"><i class="fa fa-files-o"></i><span> Izin Operasional</span></a>
    </li>

    <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
      <a href="/lku"><i class="fa fa-files-o"></i><span> LKU</span></a>
    </li>


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
    <li class="header">KELOLA DATA PENGGUNA</li>
    <li class="{{ (Request()->segment(1) == 'user') ? 'active' : ''}}">
        <a href="/user"><i class="fa fa-user"></i><span> Pegawai Jasa Pariwisata</span></a>
    </li>
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
        <a href="/bpw"><i class="fa fa-institution"></i><span> Biro Perjalanan Wisata</span></a>
    </li>

    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
      <a href="/tdup"><i class="fa fa-files-o"></i><span> TDUP</span></a>
    </li>

    <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
      <a href="/izin"><i class="fa fa-files-o"></i><span> Izin Operasional</span></a>
    </li>

    <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
      <a href="/lku"><i class="fa fa-files-o"></i><span> LKU</span></a>
    </li>


    @elseif(auth()->guard('user')->user()->level == 2)
    <li class="header">E-REPORT</li>
    <li class="{{ (Request()->segment(1) == 'ereport_bpw') ? 'active' : ''}}">
      <a href="/ereport_bpw"><i class="fa fa-bar-chart-o"></i><span> Biro Perjanan Wisata</span></a>
    </li>

    <li class="{{ (Request()->segment(1) == 'ereport_lku') ? 'active' : ''}}">
      <a href="/ereport_lku"><i class="fa fa-line-chart"></i><span> Laporan Kegiatan Usaha</span></a>
    </li>
    @endif

</ul>
</section>

</aside>