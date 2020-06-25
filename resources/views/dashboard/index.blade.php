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
                                @foreach ($assignments as $key=>$item)
                                    <option value="{{$item->company->id}}">{{$item->company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div id="dt1">
                    <span class="d-block p-2 bg-primary text-white">Perhitungan semua berdasarkan pernyataan</span>
                    <canvas id="myChart" width="400" height=200"></canvas>
                </div>
                <div id="dt2">
                    <span class="d-block p-2 bg-primary text-white">Nilai Rata - Rata Gap 5 berdasarkan dimensi</span>
                    <canvas id="myDimensi" width="400" height=200"></canvas>
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
        var id = data;
        var urls = "{{url('')}}";
        var url =urls + '/dashboard/chart/' + id;
        var ctx = document.getElementById('myChart').getContext('2d');
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
                Labels.push(data.id)
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