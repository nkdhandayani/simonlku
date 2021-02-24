@extends('layouts.master')

@section('content')
@if(\Auth::guard('bpw')->user())
<section class="content-header">
    <h1>Format Pengumpulan Laporan</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#"><i class="fa fa-home"></i>Home</a>
        </li>
        <li class="active"><a href="/dashboard">Dashboard</a></li>
    </ol>
</section>
@endif

<section class="content">
    @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0' || \Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="/tdup">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="color: black; font-size: 17px;">DATA TDUP YANG</span>
                        <span class="info-box-text" style="color: black; font-size: 17px;"> BELUM DIVERIFIKASI</span>
                        <span class="info-box-number" style="color: black; font-size: 23px;">{{$tdup_verif}}</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="/izin">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="color: black; font-size: 17px;">DATA IZIN YANG</span>
                        <span class="info-box-text" style="color: black; font-size: 17px;"> BELUM DIVERIFIKASI</span>
                        <span class="info-box-number" style="color: black; font-size: 23px;">{{$izin_verif}}</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="/lku">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="color: black; font-size: 17px;">DATA LKU YANG</span>
                        <span class="info-box-text" style="color: black; font-size: 17px;"> BELUM DIVERIFIKASI</span>
                        <span class="info-box-number" style="color: black; font-size: 23px;">{{$lku_verif}}</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif

    <div class="row">
        @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0' || \Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
        <section class="content-header format-kumpul">
            <h1>
                Format Pengumpulan Laporan
            </h1>
        </section>
        @endif

        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="table-top box-body table-responsive">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center" style="line-height: 1.2; font-size: 15px;">
                                PEMERINTAH PROVINSI BALI<br />
                                <span style="font-size: 25px; font-style: bold; letter-spacing: 2;">DINAS PARIWISATA</span><br />
                                BALI GOVERNMENT TOURISM OFFICE<br />
                                DENPASAR - BALI<br />
                                <small>Jalan S. Parman No. 1 Renon – Denpasar, Bali 80227</small>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <br />

                    <table style="width: 100%;">
                        <tr>
                            <td align="left" style="line-height: 1.5; font-size: 15px;">
                                <strong>Laporan Kegiatan Usaha (LKU)</strong><br />
                                <strong>Biro Perjalanan Wisata</strong>
                            </td>
                        </tr>
                    </table>

                    <table style="width: 100%;">
                        <tr>
                            <td width="150">Periode</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Nama Pimpinan</td>
                            <td>:</td>
                        </tr>
                    </table>

                    <div class="table-responsive square" style="overflow-x: auto;">
                        <table border="1" class="col-lg-12" style="width: 100%;">
                            <tr>
                                <td class="col-lg-6" style="margin-top: 0px;">
                                    <strong>Ketentuan:</strong>
                                    <ol class="term">
                                        <li>Laporan Kegiatan yang harus diisi serta disampaikan secara benar dan lengkap.</li>
                                        <li>Penyampaian Laporan Kegiatan Usaha dilakukan setiap semester:</li>
                                        <ol type="a" class="term">
                                            <li>
                                                Semester I, meliputi Laporan Kegiatan Usaha bulan Januari s/d Juni.<br />
                                                Disampaikan selambat-lambatnya tanggal <strong>31 Juli.</strong>
                                            </li>
                                            <li>
                                                Semester II, meliputi Laporan Kegiatan Usaha bulan Juli s/d Desember.<br />
                                                Disampaikan selambat-lambatnya tanggal <strong>31 Januari</strong> tahun berikutnya disertai dengan Confidential Tarif dan bahan-bahan promosi yang dikelurkan.
                                            </li>
                                        </ol>
                                        <li>
                                            Laporan Kegiatan Usaha disampaikan dengan Surat Pengantar dari perusahaan pelapor kepada Kepala Dinas Pariwisata Provinsi Bali cq. Kepala Biro Perekonomian dan Pembangunan Setda Provinsi Bali.
                                        </li>
                                        <li>
                                            Silakan beri nama file sebagai berikut: <strong>(Nama Travel)_Per(Periode)_Tahun</strong> dalam format <strong style="color: red;">PDF</strong><strong> (Contoh: Makmur Tour_Per1_2021.pdf)</strong>
                                        </li>
                                        <li>Minimal laporan yang dikumpulkan ialah LKU tahun <strong>2021.</strong></li>
                                    </ol>
                                    <br />
                                    <p class="tembusan">Tembusan disampaikan kepada Yth.</p>
                                    <ol type="a" class="term">
                                        <li>Kepala Dinas Pariwisata Provinsi Bali</li>
                                        <li>Bpk. Gubernur Bali cq. Kepala Biro Perekonomian dan Pembangunan Provinsi Bali</li>
                                        <li>Arsip</li>
                                    </ol>
                                </td>

                                <td class="col-lg-4" style="margin-top: 0px;">
                                    <strong>Jumlah Karyawan Tetap</strong>
                                    <p>Keterangan:</p>
                                    <ol class="term">
                                        <li>Pimpinan / Management</li>
                                        <li>Rencana Tour (Tour Planner)</li>
                                        <li>Penyusun Harga Tour (Tour Quatitation)</li>
                                        <li>Peninjauan Perjalanan</li>
                                        <li>Petugas Pemasaran</li>
                                        <li>Pramuwisata Berlisensi</li>
                                        <li>Pramuwisata Belum Berlisensi</li>
                                        <li>Petugas Tiket (Ticketing Office)</li>
                                        <li>Pengurus Dokumen Perjalanan (Travel Document)</li>
                                        <li>Petugas Administrasi dan Keuangan</li>
                                        <li>Karyawan Lain</li>
                                        <li>Jumlah</li>
                                        <p>
                                            <br />
                                            <br />
                                            <br />
                                            <br />
                                            <br />
                                        </p>
                                    </ol>
                                </td>

                                <td class="col-lg-1 term">
                                    <p style="height: 400px;"><strong>Pria</strong></p>
                                </td>

                                <td class="col-lg-1 term">
                                    <p style="height: 400px;"><strong>Wanita</strong></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection