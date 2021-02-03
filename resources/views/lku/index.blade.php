@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Data Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/lku"></i> Laporan Kegiatan Usaha</a></li>
    </ol>
  </section>

  <section class="content">
  <div class="row">
  <div class="col-xs-12">
  <div class="box box-primary">
  
        <div class="box-header">
          <div class="box-body pad table-responsive">
              <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-file"></i> Daftar Laporan Kegiatan Usaha</h3>
      
              <div style="float: right;">
              <div style="clear: both;"></div>
              @if(auth()->guard('bpw')->user())
                <a href="lku/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
              @elseif(auth()->guard('user')->user()->level == 0)  
                <a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a>
              </div>
              @endif
          </div>
         
        <div class="box-body" id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">      
        </div>

        <div class="row">
        <div class="col-xs-12">
          <table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
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
              @php
                $i=1;
              @endphp
              @foreach ($lkus as $lku)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $lku->bpw->nm_bpw }}</td>
                  <td>{{ $lku->no_surat }}</td>
                  <td>{{ $lku->tahun }}</td>
                  <td>{{ $lku->periode }}</td>
                  <td>{{ $lku->file_lku }}</td>
                  <td>{{ $lku->sts_verifikasi }}</td>
                  <td>{{ $lku->status }}</td>
                  <td>
                    <a href="#" class="fa fa-eye btn-danger btn-sm"></a>

                    @if(auth()->guard('bpw')->user() ||
                       (auth()->guard('user')->user()->level == 1))
                    <a href="#" class="fa fa-edit btn-warning btn-sm"></a>
                    @endif
                    
                  </td>
                </tr>
              @php
                $i++;
              @endphp
              @endforeach
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
</div>
@endsection