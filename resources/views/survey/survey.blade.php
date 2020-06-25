@extends('layouts.app') 

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Penilaian Beberapa Aspek</h2>
                <h5 class="text-center">{{ $company->company->name }}</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <form action="{{ route('survey.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="company_id" value="{{$company->company->id}}">
                        <input type="hidden" name="assign_id" value="{{$company->id}}">
                        <div class="col-sm-12">
                            <div class="pb-2 mt-2 mb-2">
                                <span class="badge badge-info">1</span> <small class=""><b>SB</b>: Sangat Baik</small>
                                <span class="badge badge-info">2</span> <small class=""><b>B</b>: Baik</small>
                                <span class="badge badge-info">3</span> <small class=""><b>CB</b>: Cukup Baik</small>
                                <span class="badge badge-info">4</span> <small class=""><b>KB</b>: Kurang Baik</small>
                                <span class="badge badge-info">5</span> <small class=""><b>SKB</b>: Sangat Kurang Baik</small>
                            </div>
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                        <th rowspan="2" style="vertical-align : middle;text-align:center;">Item Kriteria</th>
                                        <th colspan="5" style="border-right: 2px solid #000;">Kenyataan</th>
                                        <th colspan="5">Harapan</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th style="border-right: 2px solid #000;">5</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
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
                                                    <th class="text-center">{{ $x + 1 }}</th>
                                                    <td>{{ $value->content }}</td>
                                                    @for ($i = 0; $i < 5; $i++)
                                                    <td class="text-center" @if($i==4) style="border-right: 2px solid #000;" @endif><input style="cursor: pointer" name="k[{{$value->id}}]" type="radio" value="{{ $i + 1 }}" required></td>
                                                    @endfor
                                                    @for ($i = 0; $i < 5; $i++)
                                                    <td class="text-center"><input style="cursor: pointer" name="h[{{$value->id}}]" type="radio" value="{{ $i + 1 }}" required></td>
                                                    @endfor
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label><strong>Saran / Komentar</strong></label>
                                <textarea name="saran" class="form-control" cols="10" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection