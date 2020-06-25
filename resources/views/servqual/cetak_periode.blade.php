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
		<h5>LAPORAN HASIL SURVEY LAPANGAN <br> {{ $assign->company->name }} <br>PERIODE {{ $assign->bulan.'/'.$assign->tahun }}</h5>
	</center>
	<br>
    <br>
    <table>
        <tr>
            <td>No SK</td>
            <td>:</td>
            <td>{{ $assign->code }}</td>
        </tr>
        <tr>
            <td>Checker</td>
            <td>:</td>
            <td>{{ $assign->checker->name }}</td>
        </tr>
    </table>
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
    <br>
    <center><h5><i>"{{ $assign->saran }}"</i></h5></center>
    
 
</body>
</html>