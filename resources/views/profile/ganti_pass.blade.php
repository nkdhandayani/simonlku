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
                 


            <form action="/profile/ganti_pass/store" method="POST" class="form-horizontal">
              @csrf
              <div class="box-body">
                <div>
                    <a href="/profile" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                </div>
                <br>
                <br>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2">Password Lama</label>
                  <div class="col-sm-4">
                    <input type="password" name="password_lama" class="form-control" id="password" placeholder="Masukkan Password Lama" value="{{ old('password_lama') }}">
                    @error('password_lama')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>
                          Password Lama terdiri dari 6-20 karakter.
                        </strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2">Password Baru</label>
                  <div class="col-sm-4">
                    <input type="password" name="password_baru" class="form-control" id="password" placeholder="Masukkan Password Baru" value="{{ old('password_baru') }}">
                    @error('password_baru')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>
                          Password Baru terdiri dari 6-20 karakter.
                        </strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div  style="padding-bottom: 20px; margin-bottom: 0px;" class="form-group">
                  <label for="inputPassword3" class="col-sm-2">Password Konfirmasi</label>
                  <div class="col-sm-4">
                    <input type="password" name="password_konfirmasi" class="form-control" id="password" placeholder="Masukkan Password Konfirmasi" value="{{ old('password_konfirmasi') }}">
                  @error('password_konfirmasi')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>
                          Password Konfirmasi terdiri dari 6-20 karakter.
                        </strong>
                    </span>
                    @enderror
                  </div>
                </div>
              <div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                  </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
    @if($errors->any())
      $('#exampleModal').modal();
    @endif
</script>
@endsection