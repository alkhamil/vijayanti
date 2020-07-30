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
            <i class="fa fa-plus"></i> Tambah Assignment
        </button>
        <button class="btn btn-info mb-2" data-toggle="modal" data-target="#lihat">
            <i class="fa fa-calendar"></i> Lihat Jadwal
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
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No SK</th>
                                <th>Checker</th>
                                <th>Perusahaan</th>
                                <th>Status</th>
                                <th>Nilai Harapan</th>
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
                                    <td>
                                        {{ $a->nilai_harapan }}
                                    </td>
                                    <td class="text-center">{{ $a->bulan }}/{{ $a->tahun }}</td>
                                    <td>
                                        @if ($a->status == 0)
                                            @if (count($a->kuisioner) > 0)
                                                <button data-toggle="modal" data-target="#done-assignment{{ $a->id }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i> Selesai
                                                </button>
                                            @endif
                                        @endif
                                        <button data-toggle="modal" data-target="#hapus-assignment{{ $a->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal done -->
                                <div class="modal fade" id="done-assignment{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-assignmentLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-assignmentLabel">Selesai kan tugas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah tugas ini sudah selesai ?</h5>
                                            <b>Proses ini sekaligus akan mengirimkan hasil survey ke email {{ $a->company->name }}</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('assignment.done', $a->id) }}" class="btn btn-primary">Ya, Selesai</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapus-assignment{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-assignmentLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-assignmentLabel">Hapus Tugas ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Apakah anda yakin ingin menghapus ini ?</h5>
                                            <b>Proses ini sekaligus akan menghapus hasil survey terhadap {{ $a->company->name }}</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('assignment.hapus', $a->id) }}" class="btn btn-primary">Ya, Hapus</a>
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
            <div class="form-group">
                <label>Set Nilai Harapan</label><br>
                @for($i=1; $i<6; $i++)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline{{ $i }}" name="nilai_harapan" value="{{ $i }}" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadioInline{{ $i }}">{{ $i }}</label>
                    </div>
                @endfor
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

<!-- Modal Add -->
<div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="lihatLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
    <div class="modal-header bg-primary text-white">
        <div class="form-group">
            <label>Pilih Tahun</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-calendar text-primary"></i>
                    </div>
                </div>
                <input id="tahun" class="form-control" data-date-format="yyyy" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="modal-body">
        <div class="row" id="load">
            <div class="col-md-12">
                <h3 class="text-center">
                    <i class="fa fa-spin fa-spinner"></i> Loading ...
                </h3>
            </div>
        </div>
        <div class="row" id="data-jadwal">
            
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script>
        $('#load').hide();
        $('.datepicker').datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months",
            // endDate : (new Date('mm-yyyy') + '-01'),
            autoclose: true,
            // startDate: '-3d',
        });
        $('#tahun').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            // endDate : (new Date('mm-yyyy') + '-01'),
            autoclose: true,
            // startDate: '-3d',
        }).on('change', function(){
            $('#load').show();
            $('#data-jadwal').html("");
            var tahun = $(this).val();
            var baseURL = "{{ url('/') }}";
            var url = baseURL + '/assignment/jadwal/' + tahun;
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#data-jadwal').html(response);
                    $('#load').hide();
                }
            });
        });
    </script>
@endsection