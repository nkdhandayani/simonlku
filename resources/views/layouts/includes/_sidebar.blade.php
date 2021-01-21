<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu">

    <li class="header">MAIN NAVIGATION</li>
    
    <li class="{{ (Request()->segment(1) == 'dashboard') ? 'active' : ''}}">
      <a href="/dashboard"><i class="fa fa-home"></i><span> Dashboard</span></a>
    </li>

    @if(auth()->guard('user')->user()->level == 0)
    <li class="{{ (Request()->segment(1) == 'pengguna') ? 'active' : ''}}">
        <a href="pengguna"><i class="fa fa-user"></i><span> Kelola Pengguna</span></a>
    </li>
    @endif

    @if(auth()->guard('user')->user()->level == 0 ||
        auth()->guard('user')->user()->level == 1)
    <li class="treeview">
    	<a href="#">
   		<i class="fa fa-edit"></i><span> Kelola BPW</span>
    		<span class="pull-right-container">
    		<i class="fa fa-angle-left pull-right"></i>
    		</span>
    	</a>
    	<ul class="treeview-menu">
    		<li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
                <a href="/bpw"><i class="fa fa-circle-o"></i><span> Data Biro Perjalanan Wisata</span></a>
            </li>
    		<li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
                <a href="/tdup"><i class="fa fa-circle-o"></i><span> Data Tanda Daftar Usaha</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
                <a href="/izin"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
                <a href="/lku"><i class="fa fa-circle-o"></i><span> Data Laporan Kegiatan Usaha</span></a>
            </li>
    	</ul>
    </li>
    @endif

    @if(auth()->guard('user')->user()->level == 2)
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

    @if(auth()->guard('bpw')->user())
    <li class="treeview">
        <a href="#">
        <i class="fa fa-edit"></i><span> Kelola Data Biro</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'tdup') ? 'active' : ''}}">
                <a href="/tdup"><i class="fa fa-circle-o"></i><span> Data Tanda Daftar Usaha</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin') ? 'active' : ''}}">
                <a href="/izin"><i class="fa fa-circle-o"></i><span> Data Izin Operasional</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku') ? 'active' : ''}}">
                <a href="/lku"><i class="fa fa-circle-o"></i><span> Data Laporan Kegiatan Usaha</span></a>
            </li>
        </ul>
    </li>
    @endif


</ul>
</section>

</aside>