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
    <div class="box box-primary">

      <div class="box-header">
      <div class="box-body pad table-responsive">        	
        <h3 class="box-title" style="font-size: 25px;"><i class="fa fa-user"></i> Daftar Pengguna</h3>
        <div style="float: right;">
        <div style="clear: both;"></div>
        	<a href="user/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
        	<a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a> 
		    </div>
		  </div>
    
      <div class="box-body" id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">      
      </div>

      <div class="row">
      <div class="col-xs-12">
        <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Foto Pengguna</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengguna</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">No. Telp</th>
              <th style="width: 10rem;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Level</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
            </tr>
          </thead>
        <tbody>
            @php
              $i=1;
            @endphp
            @foreach ($users as $pengguna)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $pengguna->foto_user }}</td>
                <td>{{ $pengguna->nm_user }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->no_telp }}</td>
                <td> 
                <?php if($pengguna->level == 0)
                {
                  echo "Administrator";
                }
                  elseif($pengguna->level == 1)
                {
                  echo "Staf Jasa Pariwisata";
                }
                elseif($pengguna->level == 2)
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
                <?php if($pengguna->status == 0)
                {
                  echo "Tidak Aktif";
                }
                  elseif($pengguna->status == 1)
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
                  <a href="/user/show/{{ $pengguna->id_user }}"><i class="fa fa-eye btn-danger btn-sm"></i></a>
                  <a href="/user/edit/{{ $pengguna->id_user }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
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
  </div>
</div>
</section>

@endsection