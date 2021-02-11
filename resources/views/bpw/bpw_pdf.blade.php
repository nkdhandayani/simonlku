<!DOCTYPE html>
<html>
<head>
	<title>Daftar Biro Perjalanan Wisata</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No.</th>
      	<th>Nama BPW</th>
      	<th>Kabupaten</th>
      	<th>Email</th>
      	<th>No. Telp</th>
      	<th>Nama PIC</th>
			</tr>
		</thead>
		<tbody>
			@php
            $i=1;
          	@endphp
          	@foreach ($bpws as $bpw)
			<tr>
				<td>{{ $i }}</td>
      	<td>{{ $bpw->nm_bpw }}</td>
      	<td>{{ $bpw->kabupaten }}</td>
      	<td>{{ $bpw->email }}</td>
      	<td>{{ $bpw->no_telp }}</td>
      	<td>{{ $bpw->nm_pic }}</td>
			</tr>
      @php
        $i++;
      @endphp
      @endforeach
		</tbody>
	</table>

</body>
</html>