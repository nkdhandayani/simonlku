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
                        
                        <div class="form-group col-md-2" style="padding: 0px;">
                            <select id="tahun" class="form-control select2" style="width: 170px;" name="tahun" required="required" autocomplete="off">
                                <option disabled selected>-- Pilih Tahun LKU--</option>
                                @foreach ($lkus as $tahun)
                                <option value="{{$tahun}}">{{$tahun}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            @if(auth()->guard('user')->user() && auth()->guard('user')->user()->level == 0)
                            <div style="float: right;">
                                <div style="clear: both;"></div>
                                <a href="#" class="btn bg-purple btn-sm" target="_blank"><i class="fa fa-file-pdf-o"> Export PDF</i></a>
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama Pimpinan</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tbody">
                        
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

@section('js')
<script type="text/javascript">
    $('.select2').select2();
    $('#tahun').change(function(){
        let tahun = $('#tahun').val()
        let url = "{{url('/monitoring_lku')}}"
        let data = {
            'tahun':tahun
        }

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "GET",
            url: url,
            data: data,
            dataType: "JSON",
            success: function (data) {     
                $('#tbody').html('')              
                let html = ''
                let status = ''
                console.log(data.user.level)


                for(let i = 0; i<data.data.length; i++){
                switch (data.data[i].status) {
                            case 0:
                                 status = "Tidak Aktif";
                                break;
                            case 1:
                                status = "Aktif";
                                break;
                        }

                    html += '<tr>'
                    html += '<td>'+ (i + 1) +'</td>'
                    html += '<td>'+ data.data[i].nm_bpw+'</td>'
                    html += '<td>'+ data.data[i].kabupaten+'</td>'
                    html += '<td>'+ data.data[i].alamat+'</td>'
                    html += '<td>'+ data.data[i].no_telp+'</td>'
                    html += '<td>'+ data.data[i].nm_pic+'</td>'
                    html += '<td>'+ data.data[i].nm_pimpinan+'</td>'
                    html += '<td>'+ status+'</td>'
                    html += '</tr>'
                }

                $('#tbody').html(html)
            },

            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('error')
            },
        });

    })

    $('#refresh').click(function(){
        location.reload()
    })
</script>
@endsection