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
        <h5>LAPORAN HASIL SURVEY LAPANGAN <br> {{ $assign->company->name }}</h5>
        <h6>PERIODE {{ $assign->bulan.'/'.$assign->tahun }}</h6>
    </center>
    <hr>
	<table style="width: 100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td><h5>Pemeriksa</h5></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $assign->company->name }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Checker</td>
                        <td>:</td>
                        <td>{{ $assign->checker->name }}</td>
                    </tr>
                    <tr>
                        <td>No SK</td>
                        <td>:</td>
                        <td>{{ $assign->code }}</td>
                    </tr>
                </table>
            </td>
            <td style="color: white; width: 150px">TEST</td>
            <td>
                <table>
                    <tr>
                        <td style="text-align: right"><h5>Waktu Survey</h5></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{ $assign->created_at }}</td>
                    </tr>
                    <tr style="color: white">
                        <td>Checker</td>
                        <td>:</td>
                        <td>{{ $assign->checker->name }}</td>
                    </tr>
                    <tr style="color: white">
                        <td>No SK</td>
                        <td>:</td>
                        <td>{{ $assign->code }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Dimensi</th>
                    <th>Nilai Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dimensi as $key => $item)
                    <tr>
                        <th class="text-center">{{ $key+1 }}</th>
                        <td>{{ $item->name }} ({{ $item->description }})</td>
                        <td class="text-center">{{ $nilaiDimensi['ratakenyataan'][$item->id] - $nilaiDimensi['rataharapan'][$item->id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @php
        $kesesuaian = [];
        $kelemahan = [];
        foreach ($criteria as $key => $item) {
            $cek = $nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id];
            $ket = $keterangan->keterangan($nilai['ratakenyataan'][$item->id] - $nilai['rataharapan'][$item->id]);
            $saran = $nilai['saran'][$item->id];
            if ($cek >= 0) {
                foreach ($item->dimensi->criteria as $key => $dc) {
                    if ($dc->id == $item->id) {
                        $nomor = $key+1;
                    }
                }
                $data['no'] = $item->dimensi->nomor.'.'.$nomor;
                $data['content'] = $item->content;
                $data['saran'] = $saran;
                $data['ket'] = $ket;
                array_push($kesesuaian, $data);
            }
            if ($cek < 0) {
                foreach ($item->dimensi->criteria as $key => $dc) {
                    if ($dc->id == $item->id) {
                        $nomor = $key+1;
                    }
                }
                $data['no'] = $item->dimensi->nomor.'.'.$item->nomor;
                $data['content'] = $item->content;
                $data['saran'] = $saran;
                $data['ket'] = $ket;
                array_push($kelemahan, $data);
            }
        }
    @endphp
    <div class="table-resposive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th colspan="4" class="text-center bg-light">Kesesuaian</th>
                </tr>
                <tr>
                    <td class="text-center">No</td>
                    <td>Kriteria</td>
                    <td>Komentar</td>
                    <td class="text-center">Keterangan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($kesesuaian as $index => $ks)
                    <tr>
                        <td class="text-center"><b>{{ $ks['no'] }}</b></td>
                        <td>{{ $ks['content'] }}</td>
                        <td>{{ $ks['saran'] }}</td>
                        <td class="text-center">{{ $ks['ket'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-resposive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th colspan="4" class="text-center bg-light">Kelemahan</th>
                </tr>
                <tr>
                    <td class="text-center">No</td>
                    <td>Kriteria</td>
                    <td>Komentar</td>
                    <td class="text-center">Keterangan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelemahan as $index => $ks)
                    <tr>
                        <td class="text-center"><b>{{ $ks['no'] }}</b></td>
                        <td>{{ $ks['content'] }}</td>
                        <td>{{ $ks['saran'] }}</td>
                        <td class="text-center">{{ $ks['ket'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <p>
        Demikian disampaikan atas perhatian dan kerja samanya kami ucapkan terimakasih.
        <br>
        <br>
        Hormat kami,
        <br>
        <br>
        <br>
        <b><u>{{ $assign->checker->name }}</u></b>
    </p>
    
 
</body>
</html>