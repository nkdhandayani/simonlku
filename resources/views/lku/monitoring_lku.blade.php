@extends('layouts.master') @section('content')

<section class="content-header">
    <h1>
        Data Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li class="active"><a href="/lku_verif"> Laporan Kegiatan Usaha</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-body pad table-responsive">
                        <div class="form-group col-md-2" style="padding: 0; padding-right: 10px;">
                        <select id="thn_ajaran" class="form-control select2" name="sts_siswa" required="required" autocomplete="off">
                            <option disabled selected>-- Pilih Tahun LKU--</option>
                            <option id="tahun_ajaran" value=""></option>
                        </select>
                    </div>
                        <div>
                            <button type="button" class="btn btn-primary" id="filter"><i class=""></i> Filter</button>
                            <button type="button" class="btn btn-warning" id="refresh"><i class="fa fa-refresh"></i> Refresh</button>

                            @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
                            <div style="float: right;">
                                <div style="clear: both;"></div>
                                <a href="#" class="btn bg-purple" target="_blank"><i class="fa fa-file-pdf-o"> Export PDF</i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-body" id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row"></div>

                    <div class="row">
                        <div class="col-xs-12">
                            <table id="example1" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama BPW</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. Surat Pengantar</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tahun</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Periode</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File LKU</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status Verifikasi</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=1; @endphp @foreach ($lkus as $lku)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $lku->bpw->nm_bpw }}</td>
                                        <td>{{ $lku->no_surat }}</td>
                                        <td>{{ $lku->tahun }}</td>
                                        <td>{{ $lku->periode }}</td>
                                        <td><a href="{{ asset('file_lku/' . $lku->file_lku) }}" target="_blank">{{ $lku->file_lku }}</a></td>
                                        <td>
                                            <?php
                      if($lku->sts_verifikasi == 0) { echo "Belum Diverifikasi"; } elseif($lku->sts_verifikasi == 1) { echo "Tidak Disetujui"; } elseif($lku->sts_verifikasi == 2) { echo "Disetujui"; } ?>
                                        </td>
                                        <td><?php if($lku->status == 0) { echo "Tidak Aktif"; } elseif($lku->status == 1) { echo "Aktif"; } else { echo "-"; } ?></td>
                                        <td>
                                            <a href="/lku/show/{{ $lku->id_lku }}" class="fa fa-eye btn-danger btn-sm"></a>

                                            @if(auth()->guard('bpw')->user() || (auth()->guard('user')->user()->level == 1))
                                            <a href="/lku/edit/{{ $lku->id_lku }}" class="fa fa-edit btn-warning btn-sm"></a>
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

    <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Tambah LKU</h4>
                </div>

                <div class="box box-primary">
                    <div class="modal-body">
                        <form action="/lku/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="input_no_surat">Nomor Surat Pengantar</label>
                                <input name="no_surat" type="text" class="form-control" required="required" autocomplete="off" placeholder="Masukkan Nomor Surat Pengantar" />
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" style="padding: 0; padding-right: 10px;">
                                    <label for="input_tahun">Tahun LKU</label>
                                    <input name="tahun" type="text" class="form-control" required="required" autocomplete="off" placeholder="Masukkan Tahun LKU" value="{{ old('tahun') }}" />
                                    @error('tahun')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="padding: 0px;">
                                    <label for="periode">Periode LKU</label>
                                    <select name="periode" class="form-control">
                                        <option selected disabled>-- Pilih Periode LKU --</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file_tdup">File LKU <small style="color: red;"> *Dalam Format PDF</small></label>
                                <input name="file_lku" type="file" class="form-control-file" value="{{ old('file_lku') }}" />
                                @error('file_lku')
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