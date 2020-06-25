@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Assignment</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Assignment</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-assignment">
            <i class="fa fa-plus"></i> Tambah Assigment
        </button>
        @if (Session::has('msg'))
            <div class="alert alert-success mb-2">
                {{ Session::get('msg') }}
            </div>
        @endif
        @if (Session::has('info'))
            <div class="alert alert-warning mb-2">
                <strong>{{ Session::get('info') }}</strong>
            </div>
        @endif
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No SK</th>
                                <th>Checker</th>
                                <th>Perusahaan</th>
                                <th>Status</th>
                                <th>Periode Bertugas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $key => $a)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $a->code }}</td>
                                    <td>{{ $a->checker->name }}</td>
                                    <td>{{ $a->company->name }}</td>
                                    <td>
                                        @if ($a->status == 0)
                                            <div class="badge badge-warning">Belum Selesai</div>
                                        @else
                                            <div class="badge badge-success">Selesai</div>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $a->bulan }}/{{ $a->tahun }}</td>
                                    <td>
                                        @if ($a->status == 0)
                                            @if (count($a->kuisioner) > 0)
                                                <button data-toggle="modal" data-target="#done-assigment{{ $a->id }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i> Selesai
                                                </button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal hapus -->
                                <div class="modal fade" id="done-assigment{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-assignmentLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-assignmentLabel">Selesai kan tugas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah tugas ini sudah yakin selesai ?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('assignment.done', $a->id) }}" class="btn btn-primary">Ya, Selesai</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="tambah-assignment" tabindex="-1" role="dialog" aria-labelledby="tambah-assignmentLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="tambah-assignmentLabel">Form Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <form action="{{ route('assignment.tambah') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label>Periode Bertugas</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-calendar text-primary"></i>
                        </div>
                    </div>
                    <input name="periode" class="datepicker" class="form-control" data-date-format="mm/dd/yyyy" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label>Pilih Checker</label>
                <select name="checker_id" class="form-control" required>
                    @foreach ($checkers as $ck)
                        <option value="{{ $ck->id }}">{{ $ck->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Perusahaan</label>
                <select name="company_id" class="form-control" required>
                    @foreach ($companies as $cm)
                        <option value="{{ $cm->id }}">{{ $cm->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
        $('.datepicker').datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months",
            endDate : (new Date('mm-yyyy') + '-01'),
            autoclose: true,
            startDate: '-3d',
        });
    </script>
@endsection