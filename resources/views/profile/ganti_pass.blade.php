@extends('layouts.master')
@section('content')
<section class="content-header">
    <h1>
        Profile Pengguna
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active"><a href="#">Profile Pengguna</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                


            <form class="form-horizontal">
              <div class="box-body">

                <div>
                        <a href="/profile" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                    </div>
                    <br>
                    <br>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2">Passrowd Lama</label>
                  <div class="col-sm-3">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Password Lama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">Password Baru</label>
                  <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password Baru">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">Password Konfirmasi</label>
                  <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password Konfirmasi">
                  </div>
                </div>

              <div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection