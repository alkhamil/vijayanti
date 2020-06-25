@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Isi Survey</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Isi Survey</li>
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
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No SK</th>
                                <th>Perusahaan</th>
                                <th>Periode</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assign as $key => $c)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $c->code }}</td>
                                    <td>{{ $c->company->name }}</td>
                                    <td>{{ $c->bulan.'/'.$c->tahun }}</td>
                                    <td class="text-center">
                                        @php
                                            $kuis = $c->kuisioner->count();
                                        @endphp
                                        @if($kuis <= 0)
                                            <a href="{{ url('survey/'.$c->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Survey
                                            </a>
                                        @endif
                                        @if ($kuis > 0)
                                            <i class="fa fa-check text-success"></i> Selesai
                                        @endif
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