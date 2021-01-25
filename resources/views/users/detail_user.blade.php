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

  <section class="content" style="padding-top: 0;">
  <div class="box box-primary">
    <div class="box-body">
      <table class="table">
        <tr>
          <td width="200px">Foto</td>
          <td width="5px">:</td>
          <td>{{$detail_user->foto_user}}</td>
        </tr>
        <tr> 
          <td>Nama Pengguna</td>
          <td>:</td>
          <td>{{$detail_user->nm_user}}</td>
        </tr>
        <tr>
          <td>Username</td>
          <td>:</td>
          <td>{{$detail_user->username}}</td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td>{{$detail_user->nik}}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td>{{$detail_user->email}}</td>
        </tr>
        <tr>
          <td>No. Telp</td>
          <td>:</td>
          <td>{{$detail_user->no_telp}}</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td>{{$detail_user->jns_kelamin}}</td>
        </tr> 
        <tr>           
          <td>Level</td>
          <td>:</td>
          <td>
            <?php
            if($detail_user->level == 0)
              {
                echo "Administrator";
              }
            elseif($detail_user->level == 1)
              {
                echo "Staf Jasa Pariwisata";
              }
            elseif($detail_user->level == 2)
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
            if($detail_user->status == 0)
              {
                echo "Tidak Aktif";
              }
            elseif($detail_user->status == 1)
              {
                echo "Aktif";
              }
            else
              {
                echo "Non Aktif";
              }                          
            ?>            
          </td>    
        </tr>
      </table>            
    </div>    

    <div class="box-footer">
      <a href="/user" class="btn btn-primary">Back</a>
    </div>

  </div>
	</section>	
@endsection