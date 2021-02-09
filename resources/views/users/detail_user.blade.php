@extends('layouts.master')

@section('content')
	 <section class="content-header">
    <h1>
      Detail Pengguna
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>  Dashboard</a></li>
      <li><a href="/user"></i> Kelola Pengguna</a></li>
      <li class="active"><a href="#"></i> Detail Pengguna</a></li>
    </ol>
  </section>

  <section class="content">
  <div class="box box-primary">
    <div class="box-body pad table-responsive">

      <div>
        <button type="button" class="close" aria-label="Close"><a href="/user">
              <span aria-hidden="true">&times;</span></a>
          </button>
      </div>

      <table class="table">
        <tr>
          <td width="200px">Foto</td>
          <td width="10px">:</td>
          <td>{{$users->foto_user}}</td>
        </tr>
        <tr> 
          <td>Nama Pengguna</td>
          <td>:</td>
          <td>{{$users->nm_user}}</td>
        </tr>
        <tr>
          <td>Username</td>
          <td>:</td>
          <td>{{$users->username}}</td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td>{{$users->nik}}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td>{{$users->email}}</td>
        </tr>
        <tr>
          <td>No. Telp</td>
          <td>:</td>
          <td>{{$users->no_telp}}</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td>{{$users->jns_kelamin}}</td>
        </tr> 
        <tr>           
          <td>Level</td>
          <td>:</td>
          <td>
            <?php
            if($users->level == 0)
              {
                echo "Administrator";
              }
            elseif($users->level == 1)
              {
                echo "Staf Jasa Pariwisata";
              }
            elseif($users->level == 2)
              {
                echo "Kepala Seksi Jasa Pariwisata";
              }
            else
              {
                echo "-";
              }                          
            ?>
          </td>
        </tr>
          <tr>
          <td>Status</td>
          <td>:</td>
          <td>
            <?php
            if($users->status == 0)
              {
                echo "Tidak Aktif";
              }
            elseif($users->status == 1)
              {
                echo "Aktif";
              }
            else
              {
                echo "Tidak Aktif";
              }                          
            ?>            
          </td>    
        </tr>
      </table>            
    </div>    

  </div>
  </div>
	</section>	
@endsection