@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Data Pegawai Jasa Pariwisata
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active"><a href="/user">Pegawai Jasa Pariwisata</a></li>
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
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"> Tambah Data</i></button>
                        </div>
                    </div>

                    <div class="box-body" id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row"></div>

                        <div class="row">
                            <div class="col-xs-12" style="overflow-x: auto;">
                                <table id="example1" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">No. Telp</th>
                                            <th style="width: 10rem;" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Level</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp @foreach ($users as $pengguna)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $pengguna->nm_user }}</td>
                                            <td>{{ $pengguna->email }}</td>
                                            <td>{{ $pengguna->no_telp }}</td>
                                            <td>
                                                <?php
                                                if($pengguna->level == 0)
                                                  {
                                                    echo "Administrator";
                                                  }
                                                else
                                                  {
                                                    echo "Staf Jasa Pariwisata";
                                                  }
                                                ?>
                                            </td>
                                            <td>
                                              <?php
                                              if($pengguna->status == 0)
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
                                              ?></td>
                                            <td>
                                                <a href="/user/show/{{ $pengguna->id_user }}"><i class="fa fa-eye btn-danger btn-sm"></i></a>
                                                <a href="/user/edit/{{ $pengguna->id_user }}"><i class="fa fa-edit btn-warning btn-sm"></i></a>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp @endforeach
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
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Tambah Pegawai Jasa Pariwisata</h4>
                </div>

                <div class="box box-primary">
                    <div class="modal-body">
                        <form action="/user/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="nm_user">Nama Pegawai</label>
                                <input name="nm_user" type="text" class="form-control" id="nm_user" onkeypress="return hanyaHuruf(event)" placeholder="Masukkan Nama Pegawai" required autocomplete="off" value="{{ old('nm_user') }}" />
                                @error('nm_user')
                                <span class="invalid-feedback text-danger" role="alert">
                                    Nama Pegawai terdiri dari 6-50 karakter.
                                </span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="username">Username</label>
                                    <input name="username" type="username" class="form-control" id="username" placeholder="Masukkan Username" required autocomplete="off" value="{{ old('username') }}" />
                                    @error('username')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Username bersifat unik dari 6-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0px; margin-bottom: 25px;">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password" required autocomplete="off" value="{{ old('password') }}" />
                                    @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Password terdiri dari 6-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 8px;">
                                    <label for="nik">NIK</label>
                                    <input name="nik" type="text" class="form-control" id="nik" onkeypress="return hanyaAngka(event)" placeholder="Masukkan NIK" required autocomplete="off" value="{{ old('nik') }}" />
                                    @error('nik')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        NIK terdiri dari 16-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0;  margin-bottom: 28px;">
                                    <label for="email">E-mail</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Masukkan E-mail" required autocomplete="off" value="{{ old('email') }}" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 8px;">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input name="no_telp" type="text" class="form-control" id="no_telp" onkeypress="return hanyaAngka(event)" placeholder="Masukkan Nomor Telepon" required autocomplete="off" value="{{ old('no_telp') }}" />
                                    @error('no_telp')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nomor Telepon terdiri dari 7-15 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0;  margin-bottom: 28px;">
                                    <label for="jns_kelamin">Jenis Kelamin</label>
                                    <select name="jns_kelamin" class="form-control" id="jns_kelamin" required autocomplete="off">
                                        <option selected disabled="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jns_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jns_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jns_kelamin')
                                <span class="invalid-feedback text-danger" role="alert">
                                    Jenis Kelamin tidak boleh kosong.
                                </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 10px;" >
                                    <label for="level">Level</label>
                                    <select name="level" class="form-control" id="level" required autocomplete="off">
                                        <option selected disabled="">-- Pilih Level --</option>
                                        <option value="0" {{ old('level') == '0' ? 'selected' : '' }}>Administrator</option>
                                        <option value="1" {{ old('level') == '1' ? 'selected' : '' }}>Staf Jasa Pariwisata</option>
                                    </select>
                                    @error('level')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Level tidak boleh kosong.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 10px;">
                                    <label for="form_status" autocomplete="off">Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option selected disabled="">-- Pilih Status --</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Status tidak boleh kosong.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    </div>
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

    function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function hanyaHuruf(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return true;
        return false;
    }
</script>
@endsection