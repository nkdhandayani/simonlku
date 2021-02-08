@extends('layouts.master')

@section('content')

	<section class="content-header">
    <h1>
      Data Laporan Kegiatan Usaha
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/lku_verif"></i> LKU (Sudah Diverifikasi)</a></li>
    </ol>
  </section>

  <section class="content">
  <div class="row">
  <div class="col-xs-12">
  <div class="box box-primary">
  
        <div class="box-header">
          <div class="box-body pad table-responsive">
              <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-files-o"></i> Daftar LKU</h3>
      
              <div style="float: right;">
              <div style="clear: both;"></div>
              @if(auth()->guard('bpw')->user())
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"> Add</i></button>
              @elseif(auth()->guard('user') && auth()->guard('user')->user()->level == 0)
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
                  <td>
                      <?php if($lku->sts_verifikasi == 0)
                      {
                        echo "Tidak Disetujui";
                      }
                        elseif($lku->sts_verifikasi == 1)
                      {
                        echo "Sudah Disetujui";
                      }
                      else
                      {
                        echo "-";
                      }
                      ?>
                  </td>
                  <td>
                    <?php if($lku->status == 0)
                      {
                        echo "Tidak Aktif";
                      }
                        elseif($lku->status == 1)
                      {
                        echo "Aktif";
                      }
                      else
                      {
                        echo "-";
                      }
                      ?>
                  </td>
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
            <form action="/lku/store" method="post" enctype="multipart/form-data">{{csrf_field()}}

              <div class="form-group">
          <label for="input_no_surat">Nomor Surat Pengantar</label>
          <input name="no_surat" type="text" class="form-control">
        </div>
        
        <div class="form-row">
        <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
          <label for="input_tahun">Tahun LKU</label>
          <input name="tahun" type="text" class="form-control">
        </div>
        <div class="form-group col-md-6" style="padding: 0px;">
          <label for="periode">Periode LKU</label>
          <select name="periode" class="form-control">
            <option selected>-- Pilih Periode LKU --</option>
            <option value="I">I</option>
            <option value="II">II</option>
          </select>
        </div>
        </div>

        <div class="form-group">
          <label for="file_lku">File LKU</label>
          <input name="file_lku" type="file" class="form-control-file">
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