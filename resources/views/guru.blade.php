<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <h5 class="text-center">Tabel Guru</h5>
	<table class='table table-bordered table-striped' width="100%">
		<thead>
			<tr>
                <th>Nama Guru</th>
                <th>NIP Guru</th>
                <th>Jabatan</th>
				<th>Kode Mata Kuliah</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($guru as $p)
			<tr>
				<td>{{$p->nama_guru}}</td>
				<td>{{$p->nip_guru}}</td>
				<td>{{$p->jabatan}}</td>
				<td>{{"(".$p->sks.") ".$p->nm_matkul}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>