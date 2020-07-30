<div class="col-md-12">
    <h3 class="text-center">Jadwal pengecekan periode</h3>
    <h4 class="text-center">Tahun {{ $tahun }}</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="3" style="vertical-align: middle; text-align: center">Company</th>
                </tr>
                <tr>
                    <th colspan="13" style="text-align: center">Bulan</th>
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
    </div>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 d-flex justify-content-end">
            <a href="{{ url('/assignment/cetak-jadwal/'.$tahun) }}" target="_blank" class="btn btn-primary btn-sm">
                <i class="fa fa-print"></i> Cetak
            </a>
        </div>
    </div>
</div>