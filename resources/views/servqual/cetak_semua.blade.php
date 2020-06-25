<html>
<head>
	<title>Laporan Pernyataan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN HASIL SURVEY LAPANGAN <br> {{ $company->name }}</h5>
	</center>
	<br>
	<br>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th style="vertical-align : middle;text-align:center;">No</th>
                    <th style="vertical-align : middle;text-align:center;">Attribut Kriteria</th>
                    <th style="vertical-align : middle;text-align:center;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($criteria as $key => $item)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $item->content }}</td>
                        <td>{{$keterangan->keterangan($nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id])}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
</body>
</html>