<!DOCTYPE html>
<html>
    <head>
        <title>DAFTAR BIRO PERJALANAN WISATA TAHUN {{Carbon\Carbon::now()->isoFormat('Y')}} - DINAS PARIWISATA PROVINSI BALI</title>
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

        <p align="center" style="font-size: 25px; font-style: bold;">DAFTAR BIRO PERJALANAN WISATA TAHUN {{Carbon\Carbon::now()->isoFormat('Y')}}</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th align="center">No.</th>
                    <th align="center">Nama Biro</th>
                    <th align="center">Kabupaten</th>
                    <th align="center">Alamat</th>
                    <th align="center">No. Telepon</th>
                    <th align="center">Nama PIC</th>
                    <th align="center">Nama Pimpinan</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp @foreach ($bpws as $bpw)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $bpw->nm_bpw }}</td>
                    <td>{{ $bpw->kabupaten }}</td>
                    <td>{{ $bpw->alamat }}</td>
                    <td>{{ $bpw->no_telp }}</td>
                    <td>{{ $bpw->nm_pic }}</td>
                    <td>{{ $bpw->nm_pimpinan }}</td>
                </tr>
                @php $i++; @endphp @endforeach
            </tbody>
        </table>
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