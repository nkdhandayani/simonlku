@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/bpw"></i>Biro Perjalanan Wisata</a></li>
    </ol>
  </section>

  <section class="content">
  <div class="row">
  <div class="col-xs-12">
  <div class="box">
      	
    <div class="table-responsive">
    <div class="box-header" style="padding-right: 0px;">
      <div class="box-body">
        <h3 class="box-title" style="font-size: 25px;"><i class="fa fa-user"></i> Daftar Biro Perjalanan Wisata</h3>

        @if(auth()->guard('user')->user()->level == 0)
      	<div style="float: right;">
       	<div style="clear: both;"></div>
      		<a href="bpw/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
       		<a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a>
		  	  </div>
       	@endif 	 

		  	</div>
		  </div>

		<div class="box-body">
      <table id='listbpw' class="table table-bordered table-striped">
        <thead>
          <th>No.</th>
          <th>Foto</th>
          <th>Nama BPW</th>
          <th>Kabupaten</th>
          <th>Email</th>
          <th>No. Telp</th>
          <th>Nama Pimpinan</th>
          <th>Status</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          @php
            $i=1;
          @endphp
          @foreach ($bpws as $bpw)
          <tr>
            <td>{{ $i }}</td>
            <td>@if($bpw->foto_bpw) <img width="50px" src="data:image/png;base64,{{ base64_encode($bpw->foto_bpw) }}"/> @else - @endif</td>
            <td>{{ $bpw->nm_bpw }}</td>
            <td>{{ $bpw->kabupaten }}</td>
            <td>{{ $bpw->email }}</td>
            <td>{{ $bpw->no_telp }}</td>
            <td>{{ $bpw->nm_pimpinan }}</td>
            <td>
              <?php if($bpw->status == 0)
              {
                echo "Tidak Aktif";
              }
                elseif($bpw->status == 1)
              {
                echo "Aktif";
              }
              else
              {
                echo "Tidak Aktif";
              }
              ?>
            </td>
            <td>
              <a href="#" class="fa fa-eye btn-danger btn-sm"></a>

              @if(auth()->guard('user')->user()->level == 0)
              <a href="/bpw/{id}/edit" class="fa fa-edit btn-warning btn-sm"></a>
              <a href="#"><i class="fa fa-print btn-success btn-sm"></i></a>
              @endif
              
            </td>
          </tr>
          @php
            $i++;
          @endphp
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
    </div>

  </div>
  </div>
  </div>
  </section> 
@endsection