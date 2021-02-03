@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>
      Data Biro Perjalanan Wisata
    </h1>
    <ol class="breadcrumb">
      <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> Kelola Data</li>
      <li class="active"><a href="/bpw"></i> Biro Perjalanan Wisata</a></li>
    </ol>
  </section>
 
  <section class="content">
  <div class="row">
    <div class="col-xs-12">
    <div class="box box-primary">

    <div class="box-header">
    <div class="box-body pad table-responsive">         
      <h3 class="box-title" style="font-size: 20px;"><i class="fa fa-user"></i> Daftar Biro Perjalanan Wisata</h3>
      
      @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
      <div style="float: right;">
      <div style="clear: both;"></div>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"> Add</i></button>
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
              <a href="/bpw/show/{{ $bpw->id_bpw }}" class="fa fa-eye btn-danger btn-sm"></a>

              @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
              <a href="/bpw/edit/{{ $bpw->id_bpw }}" class="fa fa-edit btn-warning btn-sm"></a>
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
 


  <div class="modal fade" id="exampleModal" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Tambah Biro Perjalanan Wisata</h4>
        </div>

        <div class="box box-primary">
          <div class="modal-body">
            <form action="/bpw/store" method="post" enctype="multipart/form-data">{{csrf_field()}}

              <div class="form-group">
                <label for="form_nm_bpw">Nama BPW</label>
                  <input name="nm_bpw" type="text" class="form-control" id="input_nm_bpw">
              </div>
        
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_username">Username</label>
                  <input name="username" type="username" class="form-control" id="input_username">
              </div>
              <div class="form-group col-md-6" style="padding: 0px;">
                <label for="form_password">Password</label>
                  <input name="password" type="password" class="form-control" id="input_password">
              </div>
              </div>
              
              <div class="form-group">
                <label for="form_Email">E-mail</label>
                  <input name="email"type="email" class="form-control" id="input_email">
              </div>
              
              <div class="form-group">
                <label for="for_alamat">Alamat</label>
                  <textarea name="alamat" type="textarea" class="form-control" id="input_alamat" rows="6"></textarea>
              </div>
      
              <div class="form-group">
                <label for="form_kabupaten">Kabupaten/Kota</label>
                  <select name="kabupaten" class="form-control" id="input_kabupaten">
                    <option selected>-- Pilih Kabupaten/Kota --</option>
                    <option value="Kota Denpasar">Kota Denpasar</option>
                    <option value="Badung">Badung</option>
                    <option value="Gianyar">Gianyar</option>
                    <option value="Bangli">Bangli</option>
                    <option value="Tabanan">Tabanan</option>
                    <option value="Jembrana">Jembrana</option>
                    <option value="Buleleng">Buleleng</option>
                    <option value="Klungkung">Klungkung</option>
                    <option value="Karangasem">Karangasem</option>
                  </select>
              </div>
      
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_no_telp">Nomor Telepon</label>
                  <input name="no_telp" type="text" class="form-control" id="input_no_telp">
              </div>
              <div class="form-group col-md-6" style="padding: 0;">
                <label for="form_no_fax">Nomor Fax</label>
                  <input name="no_fax" type="text" class="form-control" id="input_no_fax">
              </div>
              </div>
      
              <div class="form-group">
                <label for="form_nm_pic">Nama PIC</label>
                  <input name="nm_pic" type="text" class="form-control" id="input_nm_pic">
              </div>
        
              <div class="form-group">
                <label for="form_nm_pimpinan">Nama Pimpinan</label>
                  <input name="nm_pimpinan" type="text" class="form-control" id="input_nm_pimpinan">
              </div>
        
              <div class="form-row">
              <div class="form-group col-md-6" style="padding: 0; padding-right: 10px">
                <label for="form_jns_BPW">Jenis BPW</label>
                  <select name="jns_bpw" class="form-control" id="input_jns_bpw">
                    <option selected>-- Pilih Jenis BPW --</option>
                    <option value="BPW">BPW</option>
                    <option value="MICE">MICE</option>
                    <option value="Lanjut Usia">Lanjut Usia</option>
                  </select>
              </div>
              <div class="form-group  col-md-6" style="padding: 0;">
                <label for="form_sts_kantor">Status Kantor</label>
                  <select name="sts_kantor" class="form-control" id="input_sts_kantor">
                    <option selected>-- Pilih Status Kantor --</option>
                    <option value="Hak Pribadi">Hak Pribadi</option>
                    <option value="Kontrak">Kontrak</option>
                  </select>
              </div>
              </div>
      
              <div class="form-group">
                <label for="form_nib">Nomor Induk Berusaha</label>
                  <input name="nib" type="text" class="form-control" id="input_nib">
              </div>
        
              <div class="form-group">
                <label for="form_foto_bpw">Foto BPW</label>
                  <input name="foto_bpw" type="file" class="form-control-file" id="input_foto_bpw">
              </div>
              
              <div class="form-group">
                <label for="form_status">Status</label>
                  <select name="status" class="form-control" id="input_status">
                    <option selected>-- Pilih Status --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  </select>
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