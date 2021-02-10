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
              <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-files-o"></i> Daftar Tanda Daftar Usaha Pariwata</h3>
			
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
    		<div class="col-xs-12" style="overflow-x:auto;">
        	<table id='example1' class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        		<thead>
          			<tr role="row">
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. TDUP</th>
		            	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tanggal TDUP</th>
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
		                <td>{{ $tdup->tanggal->isoFormat('dddd, DD MMMM Y') }}</td>
		                <td>@if($tdup->file_tdup) <a href="{{ asset('file_tdup/' . $tdup->file_tdup) }}" target="_blank">Lihat Gambar TDUP</a> @else - @endif </td>
		                <td>
		                	<?php
                      if($tdup->sts_verifikasi == 0)
                			{
                			  echo "Belum Diverifikasi";
                			}
                			elseif($tdup->sts_verifikasi == 1)
                			{
                			  echo "Tidak Disetujui";
                			}
                			elseif($tdup->sts_verifikasi == 2)
                      {
                        echo "Disetujui";
                      }
                			?>
		                </td>
		                <td>
		                	<?php
                      if($tdup->status == 0)
                			{
                			  echo "Tidak Aktif";
                			}
                			 elseif($tdup->status == 1)
                			{
                			  echo "Aktif";
                			}
                			?>
		                </td>
		                <td>
	                  		<a href="/tdup/show/{{ $tdup->id_tdup }}" class="fa fa-eye btn-danger btn-sm"></a>

                  			@if(auth()->guard('bpw')->user() ||
                  			   (auth()->guard('user')->user()->level == 1))
                  			<a href="/tdup/edit/{{ $tdup->id_tdup }}" class="fa fa-edit btn-warning btn-sm"></a>
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

  <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Tambah TDUP</h4>
          </div>

          <div class="box box-primary">
          <div class="modal-body">
            <form action="/tdup/store" method="post" enctype="multipart/form-data">{{csrf_field()}}

              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="no_tdup">Nomor TDUP</label>
                <input name="no_tdup" type="text" class="form-control" placeholder="Masukkan Nomor TDUP" required="required" autocomplete="off" value="{{ old('no_tdup') }}">
                @error('no_tdup')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-6" style="padding: 0;">
                <label for="tanggal">Tanggal TDUP</label>
                <input name="tanggal" type="date" class="form-control" required="required" autocomplete="off" value="{{ old('tanggal') }}">
                @error('tanggal')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-12"></div>
              </div>

              <div class="form-group">
                <label for="file_tdup">File TDUP <small style="color: red"> *Dalam Format JPG/JPEG/PNG</small></label>
                <input name="file_tdup" type="file" class="form-control-file" required="required" autocomplete="off" value="{{ old('file_tdup') }}">
                @error('file_tdup')
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