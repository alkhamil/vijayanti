@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pilih Perusahaan</label>
                            <select id="select" class="form-control">
                                @foreach ($companies as $key => $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button data-toggle="modal" data-target="#standar" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Standar Penilaian
                        </button>
                    </div>
                </div>
                <br>
                <div id="dt1">
                    <span class="d-block p-2 bg-primary text-white">Grafik survey berdasarkan Kriteria</span>
                    <canvas id="myChart" width="400" height=200"></canvas>
                </div>
                <div id="dt2">
                    <span class="d-block p-2 bg-primary text-white">Grafik survey berdasarkan Dimensi</span>
                    <canvas id="myDimensi" width="400" height=200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="standar" tabindex="-1" role="dialog" aria-labelledby="standarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="standarLabel">Standar Penilaian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
              <table class="table table-bordered table-sm">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th style="vertical-align : middle;text-align:center;">No</th>
                        <th style="vertical-align : middle;text-align:center;">Kode</th>
                        <th style="vertical-align : middle;text-align:center;">Item Kriteria</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($dimensions as $key => $d)
                        <tr>
                            <td class="bg-dark text-white" colspan="12">Dimensi {{ $d->name }} ({{ $d->description }})</td>
                        </tr>
                            @foreach ($d->criteria as $no => $value)
                                <tr>
                                    <td class="text-center">{{ $x + 1 }}</td>
                                    <td class="text-center">{{ $value->code }}</td>
                                    <td>{{ $value->content }}</td>
                                </tr>
                                @php
                                $x++; 
                                @endphp
                            @endforeach
                            @php
                                $x= $x;
                            @endphp  
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
    var currenCompany = $('#select').val();
    datas(currenCompany);
    dimensi(currenCompany);

    $('#select').change(() => {
        var data = $('#select').val();
        datas(data);
        dimensi(data);
    })

    function datas(data){
        var ctx = document.getElementById('myChart').getContext('2d');
        var id = data;
        var urls = "{{url('')}}";
        var url =urls + '/dashboard/chart/' + id;
        var Labels = new Array();
        var Labels2 = new Array();
        var Datas = new Array();
        var Datas2 = new Array();
        var Ket = new Array();
        var color = new Array();
        var color2 = new Array();

        $.get(url, function(response){
        // console.log(response.)
            response.forEach(function(data){
                Labels.push(data.code)
                Datas.push(data.nilai)
                color.push('rgba(' + colorGen () +', ' + colorGen () +',' + colorGen () +' )')
            });
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Labels,
                    datasets: [{
                        label: [],
                        data: Datas,
                        backgroundColor: color,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        
        });
    }

    function dimensi(data){
        $('#myDimensi').html("");
        var id = data;
        var urls = "{{url('')}}";
        var url2 =urls + '/dashboard/chartDimensi/' + id;
        var ctx2 = document.getElementById('myDimensi').getContext('2d');
        var Labels2 = new Array();
        var Datas2 = new Array();
        var Ket = new Array();
        var color2 = new Array();

        $.get(url2, function(response){
        // console.log(response);
        response.forEach(function(data){
            Labels2.push(data.name)
            Datas2.push(data.nilai)
            color2.push('rgba(' + colorGen () +', ' + colorGen () +',' + colorGen () +' )')
        });
        var myChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: Labels2,
                datasets: [{
                    label: [],
                    data: Datas2,
                    backgroundColor: color2,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
       
    }
    

    function colorGen () { 
        var generateColor = Math.floor(Math.random() * 256 );
        return generateColor;
    }
   
</script>
@endsection