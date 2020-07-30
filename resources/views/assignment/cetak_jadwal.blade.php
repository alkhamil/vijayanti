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
        hr {
            height: 1px;
            background: black;
        }
	</style>
	<center>
        <h5>Jadwal Pengecekan Periode</h5>
        <h6>Tahun {{ $tahun }}</h6>
    </center>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="3" style="vertical-align: middle; text-align: center">Company</th>
            </tr>
            <tr>
                <th colspan="12" style="text-align: center">Bulan</th>
            </tr>
            <tr>
                @foreach ($bulan as $b)
                    <th style="text-align: center">{{ $b->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    @foreach ($bulan as $key => $b)
                        <td>
                            @foreach ($assign as $index => $a)
                                @if ($b->id == $a->bulan && $c->id == $a->company_id)
                                    <div class="badge badge-primary">{{ $a->checker->name }}</div>
                                @endif    
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>