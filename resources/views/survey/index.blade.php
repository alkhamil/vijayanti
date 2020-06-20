@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Kriteria</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Kriteria</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @if (Session::has('msg'))
            <div class="alert alert-success mb-2">
                {{ Session::get('msg') }}
            </div>
        @endif
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assign as $key => $c)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $c->company->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('survey/'.$c->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> seurvey
                                        </a>
                                    </td>
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

@section('script')
    
@endsection