@extends('layouts.master') @section('content')
<section class="content-header">
    <h1>
        Profile Pengguna
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        <li class="active"><a href="#">Profile Pengguna</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">



        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center" style="padding:20px;">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150" />
                        <div class="mt-3">
                            <h3>John Doe</h3>
                            <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                            <button class="btn btn-warning btn-sm">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <table class="table">
                @if(\Auth::guard('bpw')->user())
                <tr>
                    <td width="150">Nama Biro</td>
                    <td width="10px">:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>No. Fax</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Nama PIC</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Nama Pimpinan</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Jenis BPW</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Status Kantor</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>NIB</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                @endif

                @if(\Auth::guard('user')->user())
                <tr>
                    <td width="150px">Nama Pegawai</td>
                    <td width="10px">:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>X</td>
                </tr>
                @endif
            </table>
                </div>
            </div>
        </div>
                <h5 style="text-align: right; padding-right: 15px; color:blue;">Ganti Password?</h5>
      </div>
    </div>
  </div>
    </div>
</section>
@endsection