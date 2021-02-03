<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu">

    <li class="header">MENU UTAMA</li>
    
    <li class="{{ (Request()->segment(1) == 'dashboard') ? 'active' : ''}}">
      <a href="/dashboard"><i class="fa fa-home"></i><span> Dashboard</span></a>
    </li>

    @if(auth()->guard('bpw')->user())
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
      <a href="/bpw"><i class="fa fa-list"></i><span> Daftar Biro Perjalanan Wisata</span></a>
    </li>

    <li class="header">KELOLA DATA</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Biro Perjalanan Wisata</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
                <a href="/tdup"><i class="fa fa-circle-o"></i><span> Tanda Daftar Usaha Pariwisata</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
                <a href="/izin"><i class="fa fa-circle-o"></i><span> Izin Operasional</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
                <a href="/lku"><i class="fa fa-circle-o"></i><span> Laporan Kegiatan Usaha</span></a>
            </li>
        </ul>
    </li>


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
    <li class="header">KELOLA DATA</li>
    <li class="{{ (Request()->segment(1) == 'user') ? 'active' : ''}}">
        <a href="user"><i class="fa fa-user"></i><span> Data Pegawai</span></a>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Data BPW</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
                <a href="/bpw"><i class="fa fa-circle-o"></i><span> Biro Perjalanan Wisata</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
                <a href="/tdup"><i class="fa fa-circle-o"></i><span> Tanda Daftar Usaha Pariwisata</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
                <a href="/izin"><i class="fa fa-circle-o"></i><span> Izin Operasional</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
                <a href="/lku"><i class="fa fa-circle-o"></i><span> Laporan Kegiatan Usaha</span></a>
            </li>
        </ul>
    </li>


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
    <li class="header">KELOLA DATA</li>
    <li class="treeview">
    	<a href="#">
   		<i class="fa fa-edit"></i><span> Data BPW</span>
    		<span class="pull-right-container">
    		<i class="fa fa-angle-left pull-right"></i>
    		</span>
    	</a>
    	<ul class="treeview-menu">
    		<li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
                <a href="/bpw"><i class="fa fa-circle-o"></i><span> Biro Perjalan Wisata</span></a>
            </li>
    		<li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
                <a href="/tdup"><i class="fa fa-circle-o"></i><span> Tanda Daftar Usaha Pariwisata</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
                <a href="/izin"><i class="fa fa-circle-o"></i><span> Izin Operasional</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
                <a href="/lku"><i class="fa fa-circle-o"></i><span> Laporan Kegiatan Usaha</span></a>
            </li>
    	</ul>
    </li>

    @elseif(auth()->guard('user')->user()->level == 2)
    <li class="treeview">
        <a href="#">
        <i class="fa fa-bar-chart-o"></i><span> E-Report</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'erebpw') ? 'active' : ''}}">
                <a href="/ereport_bpw"><i class="fa fa-circle-o"></i><span> Biro Perjalanan Wisata</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'ereport_lku') ? 'active' : ''}}">
                <a href="/ereport_lku"><i class="fa fa-circle-o"></i><span> Laporan Kegiatan Usaha</span></a>
            </li>
        </ul>
    </li>
    @endif

</ul>
</section>

</aside>