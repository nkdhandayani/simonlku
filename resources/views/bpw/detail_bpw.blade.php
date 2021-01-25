@extends('layouts.master')

@section('content')

    <section class="content-header">
      <h1>
        Data Biro Perjalanan Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li> Kelola Data</li>
        <li> Biro Perjalanan Wisata</li>
        <li class="active"><a href="#"></i>Detail Biro Perjalanan Wisata</a></li>
      </ol>
    </section>

    <section class="content" style="padding-top: 0;">
	<div class="box box-primary">
        <div class="box-body">
	        <table class="table">
	            <tr>
	              <td width="200px">Foto</td>
	              <td width="5px">:</td>
	              <td>{{$detailBPWAdmin->foto_bpw}}</td>
	            </tr>
	            <tr> 
	              <td>Nama Biro</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->nm_bpw}}</td>
	            </tr>
	            @if(auth()->guard('user')->user()->level == 0)
	            <tr>
	              <td>Username</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->username}}</td>
	            </tr>
	            @endif
	            <tr>
	              <td>Email</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->email}}</td>
	            </tr>
	            <tr>
	              <td>Alamat</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->alamat}}</td>
	            </tr>
	            <tr>
	              <td>Kabupaten</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->kabupaten}}</td>
	            </tr>
	            <tr>
	              <td>No. Telp</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->no_telp}}</td>
	            </tr>
	            <tr>
	              <td>No. Fax</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->no_fax}}</td>
	            </tr>
	            <tr>
	              <td>Nama PIC</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->nm_pic}}</td>
	            </tr>
	            <tr>
	              <td>Nama Pimpinan</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->nm_pimpinan}}</td>
	            </tr>
	            <tr>
	              <td>Jenis BPW</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->jns_bpw}}</td>
	            </tr>
	            <tr>
	              <td>Status Kantor</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->sts_kantor}}</td>
	            </tr>
	            <tr>
	              <td>NIB</td>
	              <td>:</td>
	              <td>{{$detailBPWAdmin->nib}}</td>
	            </tr>
	            <tr>
	              <td>Status</td>
	              <td>:</td>
	              <td>
	                <?php if($detailBPWAdmin->status == 0)
	                     {
	                        echo "Tidak Aktif";
	                     }
	                      elseif($detailBPWAdmin->status == 1)
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

        <div class="box-footer">
          <a href="/bpw" class="btn btn-primary">Kembali</a>
        </div>

    </div> 
	</section>