@extends('layouts.master')

@section('content')

	<section class="content-header">
      <h1>
        Data Biro Perjalanan Wisata
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li> Kelola Data</li>
        <li class="active"><a href="/tdup"></i> Tanda Daftar Usaha Pariwisata</a></li>
      </ol>
  	</section>

  	<section class="content" style="padding-top: 0;">
	<div class="row">
	<div class="col-xs-12">
	<div class="box">

	    <div class="table-responsive">
        <div class="box-header" style="padding-right: 0px;">
        	<div class="box-body">
              	<h3 class="box-title" style="font-size: 25px;"><i class="fa fa-user"></i> Tanda Daftar Usaha Pariwisata</h3>
			
	          	<div style="float: right;">
	          	<div style="clear: both;"></div>
				@if(auth()->guard('bpw')->user())
	          		<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"> Add</i></a>
	          	@elseif(auth()->guard('user')->user()->level == 0)
	          		<a href="#" class="btn bg-purple btn-sm"><i class="fa fa-print"> Print</i></a>
			  	</div>
			  	@endif
		  	</div>
		</div>

 
	    <div class="box-body">
	        <table id='listtdup' class="table table-bordered table-striped">
	        	<thead>
		            <th>No.</th>
		            <th>No. TDUP</th>
		            <th>Masa Berlaku</th>
		            <th>File TDUP</th>
		            <th>Status Verifikasi</th>
		            <th>Status</th>
		            <th>Aksi</th>
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
    </section> 
@endsection