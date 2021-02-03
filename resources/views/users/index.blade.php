@extends('layouts.master')

@section('content')
	 <section class="content-header">
      <h1>
        Data Pegawai Jasa Pariwisata
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
        <h3 class="box-title" style="font-size: 25px;"><i class="fa fa-user"></i> Daftar Pegawai Jasa Pariwisata</h3>
        <div style="float: right;">
        <div style="clear: both;"></div>
        	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"> Add</i></button>
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
              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Foto Pegawai</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pegawai</th>
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

  <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Tambah Pengguna (Pegawai Jasa Pariwisata)</h4>
          </div>

          <div class="box box-primary">
          <div class="modal-body">
            <form action="/user/store" method="post" enctype="multipart/form-data">{{csrf_field()}}

              <div class="form-group">
                <label for="form_foto_user">Foto Pegawai</label>
                <input name="foto_user" type="file" class="form-control-file" id="foto_user">
              </div>
          
              <div class="form-group">
                <label for="form_nm_user">Nama Pegawai</label>
                <input name="nm_user" type="text" class="form-control" id="nm_user">
              </div>
      
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_username">Username</label>
                <input name="username" type="username" class="form-control" id="username">
              </div>
              <div class="form-group col-md-6" style="padding: 0px;">
                <label for="form_password">Password</label>
                <input name="password" type="password" class="form-control" id="password">
              </div>
              </div>
      
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_nik">NIK</label>
                <input name="nik" type="text" class="form-control" id="nik">
              </div>
              <div class="form-group col-md-6" style="padding: 0;">
                <label for="form_Email">E-mail</label>
                <input name="email"type="email" class="form-control" id="email">
              </div>
              </div>
      
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_no_telp">Nomor Telepon</label>
                <input name="no_telp" type="text" class="form-control" id="no_telp">
              </div>
              <div class="form-group col-md-6" style="padding: 0;">
                <label for="form_jns_kelamin">Jenis Kelamin</label>
                <select name="jns_kelamin" class="form-control" id="jns_kelamin">
                  <option selected>-- Pilih Jenis Kelamin --</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                  </select>
              </div>
              </div>
      
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_level">Level</label>
                  <select name="level" class="form-control" id="level">
                    <option selected>-- Pilih Level --</option>
                    <option value="0">Administrator</option>
                    <option value="1">Staf Jasa Pariwisata</option>
                    <option value="2">Kepala Seksi Jasa Pariwisata</option>
                  </select>
              </div>
              <div class="form-group col-md-6" style="padding: 0;">
                <label for="form_status">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option selected>-- Pilih Status --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
              </div>
              </div>

              <div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
              </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section> 
@endsection