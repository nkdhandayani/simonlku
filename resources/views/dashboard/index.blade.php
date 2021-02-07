@extends('layouts.master')

@section('content')
	<section class="content-header">
      <h1>
        Dashboard
        @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0')
        Administrator
        @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
        Staf Jasa Pariwisata
        @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '2')
        Kepala Seksi Jasa Pariwisata
        @endif

        @if(\Auth::guard('bpw')->user())
        Biro Perjalanan Wisata
        @endif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active"><a href="/dashboard"></i>Dashboard</a></li>
      </ol>
    </section>


    <section class="content">
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$bpws = App\Models\BPW::count()}}</h3>
              <h4>Data BPW</h4>
            </div>
            <div class="icon">
              <i class="fa fa-institution"></i>
            </div>
            <a href="/bpw" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$tdups = App\Models\TDUP::count()}}</h3>
              <h4>Data TDUP</h4>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="/tdup" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$izins = App\Models\Izin::count()}}</h3>
              <h4>Data Izin Operasional</h4>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="/izin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$lkus = App\Models\LKU::count()}}</h3>
              <h4>Data LKU</h4>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="/lku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>


        <div class="row">
		<section class="content-header format-kumpul">
	      <h1>
	        Format Pengumpulan Laporan
	      </h1>
	    </section>

	  	<div class="col-lg-12">
	    	<div class="box box-primary">
	      		<div class="table-top box-body table-responsive">
		      
	    	      <p class="top"><strong>PEMERINTAH PROVINSI BALI</strong></p>
	    	      <p class="top"><strong>DINAS PARIWISATA</strong></p>
	    	      <p class="top"><strong>(BALI GOVERNMENT TOURISM OFFICE)</strong></p>
	    	      <p class="top"><small>Addres: JL. S. Parman Niti Mandala, Renon Phone: (0361) 222387, Fax (0361) 226313</small></p><br>

	        	  <p class="lku-bpw"><strong>Laporan Kegiatan Usaha (LKU)</strong></p>
	        	  <p class="lku-bpw"><strong>Biro Perjalanan Wisata</strong></p>

	        	  <tr>
	        	  	<td>Periode</td>
	        	  	<td>:</td>
	        	  	<td></td>
	        	  </tr><br>
	        	  <tr>
	        	  	<td>Tahun</td>
	        	  	<td>:</td>
	        	  	<td></td>
	        	  </tr><br>
	        	  <tr>
	        	  	<td>Nama Perusahaan</td>
	        	  	<td>:</td>
	        	  	<td></td>
	        	  </tr><br>
	        	  <tr>
	        	  	<td>Alamat</td>
	        	  	<td>:</td>
	        	  	<td></td>
	        	  </tr><br>
	        	  <tr>
	        	  	<td>Telephone</td>
	        	  	<td>:</td>
	        	  	<td></td>
	        	  </tr><br>
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
					  				<li>Semester I, meliputi Laporan Kegiatan Usaha bulan Januari s/d Juni.<br>
				  					Disampaikan selambat-lambatnya tanggal <strong>31 Juli.</strong></li>
					  				<li>Semester II, meliputi Laporan Kegiatan Usaha bulan Juli s/d Desember.<br>
				  					Disampaikan selambat-lambatnya tanggal <strong>31 Januari</strong> tahun berikutnya disertai dengan Confidential Tarif dan bahan-bahan promosi yang dikelurkan.</li>
					  			</ol>
				  			<li>Laporan Kegiatan Usaha disampaikan dengan Surat Pengantar dari perusahaan pelapor kepada Kepala Dinas Pariwisata Provinsi Bali cq. Kepala Biro Perekonomian dan Pembangunan Setda Provinsi Bali.</li>
				  			<li>Silakan beri nama file sebagai berikut: <strong>(Nama Travel)_Per(Periode)_Tahun</strong> dalam format <strong  style="color: red;">PDF</strong><strong>. Contoh: PT. Makmur Tour_Per1_2021.pdf</p></strong></li>
				  		</ol>
				  		<br>
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

  	  </div>
	</section>
@endsection

