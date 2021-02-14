@extends('layouts.master') @section('content') @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '2' || \Auth::guard('bpw')->user())
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
                        <span class="info-box-text" style="color: black; font-size: 25px;">VERIFIKASI TDUP</span>
                        <span class="info-box-number" style="color: black; font-size: 25px;">{{$tdup_verif}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="/izin">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="color: black; font-size: 25px;">VERIFIKASI IZIN</span>
                        <span class="info-box-number" style="color: black; font-size: 25px;">{{$izin_verif}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="/lku">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" style="color: black; font-size: 25px;">VERIFIKASI LKU</span>
                        <span class="info-box-number" style="color: black; font-size: 25px;">{{$lku_verif}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
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
                    <p class="top"><strong>PEMERINTAH PROVINSI BALI</strong></p>
                    <p class="top"><strong>DINAS PARIWISATA</strong></p>
                    <p class="top"><strong>(BALI GOVERNMENT TOURISM OFFICE)</strong></p>
                    <p class="top"><small>Addres: JL. S. Parman Niti Mandala, Renon Phone: (0361) 222387, Fax (0361) 226313</small></p>
                    <br />

                    <p class="lku-bpw"><strong>Laporan Kegiatan Usaha (LKU)</strong></p>
                    <p class="lku-bpw"><strong>Biro Perjalanan Wisata</strong></p>

                    <tr>
                        <td>Periode</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <br />
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <br />
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <br />
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <br />
                    <tr>
                        <td>Telephone</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <br />
                    <tr>
                        <td>Nama Pimpinan</td>
                        <td>:</td>
                        <td></td>
                    </tr>

                    <div class="table-responsive square">
                        <table border="1" class="col-lg-12">
                            <tr>
                                <td class="col-lg-6">
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
                                    </ol>
                                    <br />
                                    <p class="tembusan">Tembusan disampaikan kepada Yth.</p>
                                    <ol type="a" class="term">
                                        <li>Kepala Dinas Pariwisata Provinsi Bali</li>
                                        <li>Bpk. Gubernur Bali cq. Kepala Biro Perekonomian dan Pembangunan Provinsi Bali</li>
                                        <li>Arsip</li>
                                    </ol>
                                </td>

                                <td class="col-lg-4 jml-pegawai">
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
                                    </ol>
                                </td>

                                <td class="col-lg-1 bottom">
                                    <strong>Pria</strong>
                                </td>

                                <td class="col-lg-1 bottom">
                                    <strong>Wanita</strong>
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