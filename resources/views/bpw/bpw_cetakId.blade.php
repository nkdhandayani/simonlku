<!DOCTYPE html>
<html>
    <head>
        <title>DATA BIRO PERJALANAN WISATA - DINAS PARIWISATA PROVINSI BALI</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <style type="text/css">
            .line-title {
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <img src="assets/images/Logo Dinas Pariwisata.png" style="position: absolute; width: 100px; height: auto;" />
        <table style="width: 100%;">
            <tr>
                <td align="center" style="line-height: 1.2; font-size: 15px;">
                    PEMERINTAH PROVINSI BALI<br />
                    <span style="font-size: 25px; font-style: bold; letter-spacing: 2;">DINAS PARIWISATA</span><br />
                    BALI GOVERNMENT TOURISM OFFICE<br />
                    DENPASAR - BALI<br />
                    <small>Jalan S. Parman No. 1 Renon – Denpasar, Bali 80227</small>
                </td>
            </tr>
        </table>
        <hr class="line-title" />

        <p align="center" style="font-size: 25px; font-style: bold;">DATA BIRO PERJALANAN WISATA</p>
        <div class="box-body">
            <table class="table table-bordered">
                ($bpws as $bpws)
                <tr>
                    <td width="200">Nama Biro Perjalanan Wisata</td>
                    <td width="10px">:</td>
                    <td>{{$bpws->nm_bpw}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$bpws->email}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$bpws->alamat}}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>{{$bpws->kabupaten}}</td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td>{{$bpws->no_telp}}</td>
                </tr>
                <tr>
                    <td>Nomor Fax</td>
                    <td>:</td>
                    <td>
                        @if($bpws->no_fax != null)
                            {{$bpws->no_fax}}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Nama PIC</td>
                    <td>:</td>
                    <td>{{$bpws->nm_pic}}</td>
                </tr>
                <tr>
                    <td>Nama Pimpinan</td>
                    <td>:</td>
                    <td>{{$bpws->nm_pimpinan}}</td>
                </tr>
                <tr>
                    <td>Jenis Biro Perjalanan Wisata</td>
                    <td>:</td>
                    <td>{{$bpws->jns_bpw}}</td>
                </tr>
                <tr>
                    <td>Status Kantor</td>
                    <td>:</td>
                    <td>{{$bpws->sts_kantor}}</td>
                </tr>
                <tr>
                    <td>NIB</td>
                    <td>:</td>
                    <td>{{$bpws->nib}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <?php
                        if($bpws->status == 0)
                            {
                                echo "Tidak Aktif";
                            }
                        else
                            {
                                echo "Aktif";
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <!-- /.box-body -->
            <div class="box-footer"></div>
        </div>
        <br />
        <br />
        <table border="0" width="100%">
            <tr>
                <td align="left" width="50%">
                    Mengetahui,<br />
                    Kepala Seksi Jasa Pariwisata
                    <br />
                    <br />
                    <br />
                    <b><u>Ni Luh Herawati, SS., M.Par</u></b>
                </td>
                <td align="right" width="50%">
                    Denpasar, {{Carbon\Carbon::now()->isoFormat('D MMMM Y')}}<br />
                    Administrator
                    <br />
                    <br />
                    <br />
                    <b><u>@if(\Auth::guard('user')->check()){{ \Auth::guard('user')->user()->nm_user }} @endif</u></b>
                </td>
            </tr>
        </table>
    </body>
</html>