@extends('layouts.master') @section('content')
<section class="content-header">
    <h1>
        Data Izin Operasional
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li class="active"><a href="/izin"> Izin Operasional</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-body pad table-responsive">
                        <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-files-o"></i> Daftar Izin Operasional</h3>

                        <div style="float: right;">
                            <div style="clear: both;"></div>
                            @if(auth()->guard('bpw')->user())
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"> Add</i></button>
                            @endif
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. Izin Operasional</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tanggal Izin Operasional</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File Izin Operasional</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status Verifikasi</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp @foreach ($izins as $izin)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $izin->no_izin }}</td>
                                            <td>{{ $izin->tgl_izin->isoFormat('dddd, DD MMMM Y') }}</td>
                                            <td>@if($izin->file_izin) <a href="{{ asset('file_izin/' . $izin->file_izin) }}" target="_blank">Lihat Gambar Izin Operasional</a> @else - @endif</td>
                                            <td>
                                              <?php
                                                if($izin->sts_verifikasi == 0) { echo "Belum Diverifikasi"; }
                                                elseif($izin->sts_verifikasi == 1) { echo "Tidak Disetujui"; }
                                                elseif($izin->sts_verifikasi == 2) { echo "Disetujui"; }
                                              ?>
                                            </td>
                                            <td>
                                                <a href="/izin/show/{{ $izin->id_izin }}" class="fa fa-eye btn-danger btn-sm"></a>

                                                @if(auth()->guard('bpw')->user() || (auth()->guard('user')->user()->level == 1))
                                                <a href="/izin/edit/{{ $izin->id_izin }}" class="fa fa-edit btn-warning btn-sm"></a>
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
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Tambah Izin Operasional</h4>
                </div>

                <div class="box box-primary">
                    <div class="modal-body">
                        <form action="/izin/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                                    <label for="no_izin">Nomor Izin Operasional</label>
                                    <input name="no_izin" type="text" class="form-control" required="required" autocomplete="off" placeholder="Masukkan Nomor Izin Operasional" value="{{ old('no_izin') }}" />
                                    @error('no_izin')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0;">
                                    <label for="tgl_izin">Tanggal Izin Operasional</label>
                                    <input name="tgl_izin" type="date" class="form-control" required="required" autocomplete="off" value="{{ old('tgl_izin') }}" />
                                    @error('tgl_izin')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file_tdup">File Izin Operasional <small style="color: red;"> *Dalam Format JPG/JPEG/PNG</small></label>
                                <input name="file_izin" type="file" class="form-control-file" value="{{ old('file_izin') }}" />
                                @error('file_izin')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
</section>
@endsection

@section('js')
<script type="text/javascript">
    @if($errors->any())
      $('#exampleModal').modal();
    @endif
</script>
@endsection