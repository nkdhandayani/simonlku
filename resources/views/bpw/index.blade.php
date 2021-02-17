@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Data Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li class="active"><a href="/bpw"> Biro Perjalanan Wisata</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-body pad table-responsive">
                        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-institution"></i> Daftar Biro Perjalanan Wisata</h3>

                        @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
                        <div style="float: right;">
                            <div style="clear: both;"></div>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"> Tambah Data</i></button>
                            <a href="/bpw/cetak" class="btn bg-purple btn-sm" target="_blank"><i class="fa fa-file-pdf-o"> Export PDF</i></a>
                        </div>
                        @endif
                    </div>

                    <div class="box-body" id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row"></div>

                        <div class="row">
                            <div class="col-xs-12" style="overflow-x: auto;">
                                <table id="example1" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama BPW</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Kabupaten</th>
                                            <th style="width: 200px;" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                Alamat
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. Telp</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama PIC</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp @foreach ($bpws as $bpw)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $bpw->nm_bpw }}</td>
                                            <td>{{ $bpw->kabupaten }}</td>
                                            <td>{{ $bpw->alamat }}</td>
                                            <td>{{ $bpw->no_telp }}</td>
                                            <td>{{ $bpw->nm_pic }}</td>
                                            <td><?php if($bpw->status == 0) { echo "Tidak Aktif"; } elseif($bpw->status == 1) { echo "Aktif"; } else { echo "Tidak Aktif"; } ?></td>
                                            <td>
                                                <a href="/bpw/show/{{ $bpw->id_bpw }}" class="fa fa-eye btn-danger btn-sm"></a>

                                                @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
                                                <a href="/bpw/edit/{{ $bpw->id_bpw }}" class="fa fa-edit btn-warning btn-sm"></a>
                                                <a href="/bpw/cetakId/{{ $bpw->id_bpw }}" target="-_blank"><i class="fa fa-print btn-success btn-sm"></i></a>
                                                @endif
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
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-institution"></i> Tambah Biro Perjalanan Wisata</h4>
                </div>

                <div class="box box-primary">
                    <div class="modal-body">
                        <form action="/bpw/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group" style="margin-bottom: 10px;">
                                <label for="nm_bpw">Nama BPW</label>
                                <input name="nm_bpw" type="text" class="form-control" id="nm_bpw" placeholder="Masukkan Nama BPW" required autocomplete="off" value="{{ old('nm_bpw') }}" />
                                @error('nm_bpw')
                                <span class="invalid-feedback text-danger" role="alert">
                                    Nama BPW terdiri dari 6-50 karakter.
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
                                <div style="padding: 0px; padding-right: 10px; margin-bottom: 25px;" class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password" required autocomplete="off" />
                                    @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Password terdiri dari 6-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="email">E-mail</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Masukkan E-mail" required autocomplete="off" value="{{ old('email') }}" />
                                </div>
                                <div style="padding: 0px; margin-bottom: 25px;" class="form-group col-md-6">
                                    <label for="nib">Nomor Induk Berusaha</label>
                                    <input name="nib" type="nib" class="form-control" id="nib" placeholder="Masukkan Nomor Induk Berusaha" required autocomplete="off" value="{{ old('nib') }}" />
                                    @error('nib')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        NIK terdiri dari 13-20 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" type="textarea" class="form-control" id="alamat" rows="6" placeholder="Masukkan Alamat" required autocomplete="off">{{ old('alamat') }}</textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input name="no_telp" type="text" class="form-control" id="no_telp" placeholder="Masukkan Nomor Telepon" required autocomplete="off" value="{{ old('no_telp') }}" />
                                    @error('no_telp')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nomor Telepon terdiri dari 7-15 karakter.
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="no_fax">Nomor Fax</label>
                                    <input name="no_fax" type="text" class="form-control" id="no_fax" placeholder="Masukkan Nomor Fax" autocomplete="off" value="{{ old('no_fax') }}" />
                                    @error('no_fax')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        Nomor Fax terdiri dari 7-15 karakter.
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="nm_pimpinan">Nama Pimpinan</label>
                                <input name="nm_pimpinan" type="text" class="form-control" id="nm_pimpinan" placeholder="Masukkan Nama BPW" required autocomplete="off" value="{{ old('nm_pimpinan') }}" />
                                @error('nm_pimpinan')
                                <span class="invalid-feedback text-danger" role="alert">
                                    Nama Pimpinan terdiri dari 6-50 karakter.
                                </span>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 25px;">
                                <label for="nm_pic">Nama PIC</label>
                                <input name="nm_pic" type="text" class="form-control" id="nm_pic" placeholder="Masukkan Nama BPW" required autocomplete="off" value="{{ old('nm_pic') }}" />
                                @error('nm_pic')
                                <span class="invalid-feedback text-danger" role="alert">
                                    Nama PIC terdiri dari 6-50 karakter.
                                </span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="jns_BPW">Jenis BPW</label>
                                    <select name="jns_bpw" class="form-control" id="jns_bpw" required autocomplete="off">
                                        <option selected disabled>-- Pilih Jenis BPW --</option>
                                        <option value="BPW" {{ old('jns_bpw') == 'BPW' ? 'selected' : '' }}>BPW</option>
                                        <option value="MICE" {{ old('jns_bpw') == 'MICE' ? 'selected' : '' }}>MICE</option>
                                        <option value="Lanjut Usia"{{ old('jns_bpw') == 'Lanjut Usia' ? 'selected' : '' }}>Lanjut Usia</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="sts_kantor">Status Kantor</label>
                                    <select name="sts_kantor" class="form-control" id="sts_kantor" required autocomplete="off">
                                        <option selected disabled>-- Pilih Status Kantor --</option>
                                        <option value="Hak Pribadi"old('sts_kantor') == 'Hak Pribadi' ? 'selected' : '' }}>Hak Pribadi</option>
                                        <option value="Kontrak"{{ old('sts_kantor') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px; margin-bottom: 5px;">
                                    <label for="form_kabupaten">Kabupaten/Kota</label>
                                    <select name="kabupaten" class="form-control" id="input_kabupaten" required autocomplete="off">
                                        <option selected disabled>-- Pilih Kabupaten/Kota --</option>
                                        <option value="Kota Denpasar"{{ old('kabupaten') == 'Kota Denpasar' ? 'selected' : '' }}>Kota Denpasar</option>
                                        <option value="Badung"{{ old('kabupaten') == 'Badung' ? 'selected' : '' }}>Badung</option>
                                        <option value="Gianyar"{{ old('kabupaten') == 'Badung' ? 'selected' : '' }}>Gianyar</option>
                                        <option value="Bangli"{{ old('kabupaten') == 'Bangli' ? 'selected' : '' }}>Bangli</option>
                                        <option value="Tabanan"{{ old('kabupaten') == 'Tabanan' ? 'selected' : '' }}>Tabanan</option>
                                        <option value="Jembrana"{{ old('kabupaten') == 'Jembrana' ? 'selected' : '' }}>Jembrana</option>
                                        <option value="Buleleng"{{ old('kabupaten') == 'Buleleng' ? 'selected' : '' }}>Buleleng</option>
                                        <option value="Klungkung"{{ old('kabupaten') == 'Klungkung' ? 'selected' : '' }}>Klungkung</option>
                                        <option value="Karangasem"{{ old('kabupaten') == 'Karangasem' ? 'selected' : '' }}>Karangasem</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6" style="padding: 0; margin-bottom: 25px;">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" required autocomplete="off">
                                        <option disabled selected>-- Pilih Status --</option>
                                        <option value="1"{{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0"{{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('js')
<script type="text/javascript">
    @if($errors->any())
      $('#exampleModal').modal();
    @endif
</script>
@endsection