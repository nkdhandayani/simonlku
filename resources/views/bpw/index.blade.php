@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/bpw"></i>Biro Perjalanan Wisata</a></li>
    </ol>
  </section>

  <section class="content">
  <div class="row">
    <div class="col-xs-12">
    <div class="box box-primary">

    <div class="box-header">
    <div class="box-body pad table-responsive">         
      <h3 class="box-title" style="font-size: 25px;"><i class="fa fa-user"></i> Daftar Biro Perjalanan Wisata</h3>
      
      @if(auth()->guard('user')->user()->level == 0)
      <div style="float: right;">
      <div style="clear: both;"></div>
        <a href="bpw/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
        <a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a> 
      @endif 	 
    </div>
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
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Foto</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama BPW</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Kabupaten</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Email</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. Telp</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama Pimpinan</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i=1;
          @endphp
          @foreach ($bpws as $bpw)
          <tr>
            <td>{{ $i }}</td>
            <td>@if($bpw->foto_bpw) <img width="50px" src="data:image/png;base64,{{ base64_encode($bpw->foto_bpw) }}"/> @else - @endif</td>
            <td>{{ $bpw->nm_bpw }}</td>
            <td>{{ $bpw->kabupaten }}</td>
            <td>{{ $bpw->email }}</td>
            <td>{{ $bpw->no_telp }}</td>
            <td>{{ $bpw->nm_pimpinan }}</td>
            <td>
              <?php if($bpw->status == 0)
              {
                echo "Tidak Aktif";
              }
                elseif($bpw->status == 1)
              {
                echo "Aktif";
              }
              else
              {
                echo "Tidak Aktif";
              }
              ?>
            </td>
            <td>
              <a href="#" class="fa fa-eye btn-danger btn-sm"></a>

              @if(auth()->guard('user')->user()->level == 0)
              <a href="/bpw/{id}/edit" class="fa fa-edit btn-warning btn-sm"></a>
              <a href="#"><i class="fa fa-print btn-success btn-sm"></i></a>
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
</div>
</section> 
@endsection