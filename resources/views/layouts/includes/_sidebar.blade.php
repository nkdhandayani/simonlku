<aside class="main-sidebar">

<section class="sidebar">
<ul class="sidebar-menu">

    <li class="header">MENU UTAMA</li>
    
    <li class="{{ (Request()->segment(1) == 'dashboard') ? 'active' : ''}}">
      <a href="/dashboard"><i class="fa fa-home"></i><span> Dashboard</span></a>
    </li>

    @if(auth()->guard('bpw')->user())
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
      <a href="/bpw"><i class="fa fa-institution"></i><span> Daftar Biro Perjalanan Wisata</span></a>
    </li>

    <li class="header">KELOLA DATA BIRO</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> TDUP</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'tdup_verif') ? 'active' : ''}}">
                <a href="/tdup_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'tdup_nonverif') ? 'active' : ''}}">
                <a href="/tdup_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> Izin Operasional</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'izin_verif') ? 'active' : ''}}">
                <a href="/izin_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin_nonverif') ? 'active' : ''}}">
                <a href="/izin_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> LKU</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'lku_verif') ? 'active' : ''}}">
                <a href="/lku_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku_nonverif') ? 'active' : ''}}">
                <a href="/lku_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
    <li class="header">KELOLA DATA PEGAWAI</li>
    <li class="{{ (Request()->segment(1) == 'user') ? 'active' : ''}}">
        <a href="/user"><i class="fa fa-user"></i><span> Pegawai Jasa Pariwisata</span></a>
    </li>

    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
        <a href="/bpw"><i class="fa fa-institution"></i><span> Biro Perjalanan Wisata</span></a>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> TDUP</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'tdup_verif') ? 'active' : ''}}">
                <a href="/tdup_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'tdup_nonverif') ? 'active' : ''}}">
                <a href="/tdup_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> Izin Operasional</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'izin_verif') ? 'active' : ''}}">
                <a href="/izin_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin_nonverif') ? 'active' : ''}}">
                <a href="/izin_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> LKU</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'lku_verif') ? 'active' : ''}}">
                <a href="/lku_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku_nonverif') ? 'active' : ''}}">
                <a href="/lku_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>


    @elseif(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 1)
    <li class="header">KELOLA DATA BIRO</li>
    <li class="{{ (Request()->segment(1) == 'bpw') ? 'active' : ''}}">
        <a href="/bpw"><i class="fa fa-institution"></i><span> Biro Perjalanan Wisata</span></a>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> TDUP</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'tdup_verif') ? 'active' : ''}}">
                <a href="/tdup_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'tdup_nonverif') ? 'active' : ''}}">
                <a href="/tdup_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> Izin Operasional</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'izin_verif') ? 'active' : ''}}">
                <a href="/izin_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'izin_nonverif') ? 'active' : ''}}">
                <a href="/izin_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
        <i class="fa fa-file-text"></i><span> LKU</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ (Request()->segment(1) == 'lku_verif') ? 'active' : ''}}">
                <a href="/lku_verif"><i class="fa fa-circle-o"></i><span> Sudah Diverifikasi</span></a>
            </li>
            <li class="{{ (Request()->segment(1) == 'lku_nonverif') ? 'active' : ''}}">
                <a href="/lku_nonverif"><i class="fa fa-circle-o"></i><span> Belum Diverifikasi</span></a>
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
            <li class="{{ (Request()->segment(1) == 'ereport_bpw') ? 'active' : ''}}">
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