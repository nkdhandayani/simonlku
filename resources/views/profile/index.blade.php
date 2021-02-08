@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Detail Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li> Kelola Data</li>
        <li><a href="/tdup"></i> Tanda Daftar Usaha Pariwisata</a></li>
        <li class="active"><a href="#"></i> Detail TDUP</a></li>
      </ol>
  	</section>

  	<section class="content">
  	<div class="box box-primary">
        <div class="box-body pad table-responsive">

        <div class="box-footer">
          <a href="/tdup" class="btn btn-primary btn-sm">Back</a>
        </div>

          <table class="table">
            <tr>
              <td width="300">Foto Pengguna</td>
              <td width="10">:</td>
              <td>@if($users->foto_user) <a href="{{ asset('foto_user/' . $users->foto_user) }}"><img width="100px" src="{{ asset('foto_user/' . $users->foto_user) }}"/></a> @else - @endif</td>
            </tr>
            <tr> 
              <td>Nama Pengguna</td>
              <td>:</td>
              <td>{{$users->nm_user}}</td>
            </tr>
            <tr> 
              <td>NIK</td>
              <td>:</td>
              <td>{{$users->nik}}</td>
            </tr>
            <tr> 
              <td>E-mail</td>
              <td>:</td>
              <td>{{$users->email}}</td>
            </tr>
            <tr> 
              <td>No. Telepon</td>
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