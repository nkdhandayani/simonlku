@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        Data Monitoring Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li>Kelola Data</li>
        <li class="active"><a href="/monitoring_lku"> Monitoring Laporan Kegiatan Usaha</a></li>
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

                    <div class="box-body" id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row"></div>

                        <div class="row">
                            <div class="col-xs-12">
                                <table id="example1" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama BPW</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Kabupaten</th>
                                            <th style="width: 200px;" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Alamat</th>
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
                                                <a href="/bpw/edit/{{ $bpw->id_bpw }}" class="fa fa-edit btn-success btn-sm"></a>
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
</section>
@endsection