@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Data Tanda Daftar Usaha Pariwisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li> Kelola Data</li>
        <li class="active"><a href="/tdup"></i> Tanda Daftar Usaha Pariwisata</a></li>
      </ol>
  	</section>

  	<section class="content">
	<div class="row">
	<div class="col-xs-12">
	<div class="box box-primary">

        <div class="box-header">
        	<div class="box-body pad table-responsive">
              	<h3 class="box-title" style="font-size: 20px;"><i class="fa fa-file"></i> Daftar Tanda Daftar Usaha Pariwisata</h3>
			
	          	<div style="float: right;">
	          	<div style="clear: both;"></div>
				@if(auth()->guard('bpw')->user())
	          		<a href="tdup/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
	          	@elseif(auth()->guard('user')->user()->level == 0)
	          		<a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a>
			  	</div>
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
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. TDUP</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Masa Berlaku</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File TDUP</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status Verifikasi</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aksi</th>
		            </tr>
	        	</thead>
	          	<tbody>
	            @php
	              $i=1;
	            @endphp
	            @foreach ($tdups as $tdup)
	            	<tr>
		                <td>{{ $i }}</td>
		                <td>{{ $tdup->no_tdup }}</td>
		                <td>{{ $tdup->ms_berlaku }}</td>
		                <td>@if($tdup->file_tdup) <img width="50px" src="data:image/png;base64,{{ base64_encode($tdup->file_tdup) }}"/> @else - @endif</td>
		                <td>{{ $tdup->sts_verifikasi }}</td>
		                <td>{{ $tdup->status }}</td>
		                <td>
	                  		<a href="/tdup/show/{{ $tdup->id_tdup }}" class="fa fa-eye btn-danger btn-sm"></a>

                  			@if(auth()->guard('bpw')->user() ||
                  			   (auth()->guard('user')->user()->level == 1))
                  			<a href="/tdup/show/{{ $tdup->id_tdup }}" class="fa fa-edit btn-warning btn-sm"></a>

                  			@elseif(auth()->guard('user')->user()->level == 0)
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