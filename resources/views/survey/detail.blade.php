@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Detail</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div>
                <h3>{{ $assign->company->name }}</h3>
            </div>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Pernyataan</th>
                                <th>Kenyataan</th>
                                <th>Harapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuisioner as $key=>$item)
                                <tr>
                                    <th class="text-center">{{$key + 1}}</th>
                                    <td>{{$item->criteria->content}}</td>
                                    <td class="text-center">{{$item->kenyataan}}</td>
                                    <td class="text-center">{{$item->harapan}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection