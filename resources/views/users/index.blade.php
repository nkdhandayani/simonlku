@extends('layouts.master')

@section('content')
	<section class="content-header">
      <h1>
        Data Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="/user"></i>Kelola Pengguna</a></li>
      </ol>
    </section>


  <section class="content">
	<div class="row">
  	<div class="col-xs-12">
    <div class="box">
      	
      	<div class="table-responsive">
        <div class="box-header" style="padding-right: 0px;">
        	<div class="box-body">
              <h3 class="box-title" style="font-size: 25px;"><i class="fa fa-user"></i> Daftar Pengguna</h3>
          		<div style="float: right;">
          		<div style="clear: both;"></div>
          			<a href="user/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
          			<a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a>
		  		</div>
		  	</div>
		</div>

    
      <div class="box-body">
        <table id = "dataTable" class="table table-bordered table-striped">
          <thead>
            <th>No.</th>
            <th>Foto Pengguna</th>
            <th>Nama Pengguna</th>
            <th>Email</th>
            <th>No. Telp</th>
            <th>Level</th>
            <th>Status</th>
            <th>Aksi</th>
          </thead>
        <tbody>
            @php
              $i=1;
            @endphp
            @foreach ($users as $user)
              <tr>
                <td>{{ $i }}</td>
                <td>@if($user->foto_user) <img width="50px" src="data:image/png;base64,{{ base64_encode($user->foto_user) }}"/> @else - @endif</td>
                <td>{{ $user->nm_user }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->no_telp }}</td>
                <td> 
                <?php if($user->level == 0)
                {
                  echo "Administrator";
                }
                  elseif($user->level == 1)
                {
                  echo "Staf Jasa Pariwisata";
                }
                elseif($user->level == 2)
                {
                  echo "Kepala Seksi Jasa Pariwisata";
                }
                else
                {
                  echo "Admin";
                }
                ?>
                </td>
                <td>
                <?php if($user->status == 0)
                {
                  echo "Tidak Aktif";
                }
                  elseif($user->status == 1)
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
                  <a href="/user/{id}/detail_user"><i class="fa fa-eye btn-danger btn-sm"></i></a>
                  <a href="/user/{id}/edit"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                  <a href="#"><i class="fa fa-print btn-success btn-sm"></i></a>
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