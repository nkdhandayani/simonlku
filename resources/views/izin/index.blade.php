@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Data Izin Operasional
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li> Kelola Data</li>
        <li class="active"><a href="/izin"></i> Izin Operasional</a></li>
      </ol>
    </section>

  	<section class="content">
	<div class="row">
	<div class="col-xs-12">
	<div class="box box-primary">

        <div class="box-header">
        	<div class="box-body pad table-responsive">
              	<h3 class="box-title" style="font-size: 20px;"><i class="fa fa-file"></i> Daftar Izin Operasional</h3>
			
	          	<div style="float: right;">
	          	<div style="clear: both;"></div>
				@if(auth()->guard('bpw')->user())
	          		<a href="izin/create" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
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
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. Izin Operasional</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Masa Berlaku</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File Izin Operasional</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status Verifikasi</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Aksi</th>
		            </tr>
	        	</thead>
	          
	          	<tbody>
	            @php
	              $i=1;
	            @endphp
	            @foreach ($izins as $izin)
	            	<tr>
		                <td>{{ $i }}</td>
		                <td>{{ $izin->no_izin }}</td>
		                <td>{{ $izin->ms_berlaku }}</td>
		                <td>@if($izin->file_izin) <img width="50px" src="data:image/png;base64,{{ base64_encode($izin->file_izin) }}"/> @else - @endif</td>
		                <td>{{ $izin->sts_verifikasi }}</td>
		                <td>{{ $izin->status }}</td>
		                <td>
	                  		<a href="#" class="fa fa-eye btn-danger btn-sm"></a>

                  			@if(auth()->guard('bpw')->user() ||
                  			   (auth()->guard('user')->user()->level == 1))
                  			<a href="#" class="fa fa-edit btn-warning btn-sm"></a>

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