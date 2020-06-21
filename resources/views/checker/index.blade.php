@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Checker</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Checker</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-checker">
            <i class="fa fa-plus"></i> Tambah Checker
        </button>
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
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($checkers as $key => $c)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($c->birthday)) }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->phone }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit-checker{{ $c->id }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button data-toggle="modal" data-target="#hapus-checker{{ $c->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                        <button data-toggle="modal" data-target="#info-akun{{ $c->id }}" class="btn btn-secondary btn-sm">
                                            <i class="fa fa-lock"></i> Info Akun
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit-checker{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-checkerLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-checkerLabel">Form Edit Dimensi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('checker.edit') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="checker_id" value="{{ $c->id }}">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="name" value="{{ $c->name }}" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="birthday" value="{{ $c->birthday }}" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" value="{{ $c->email }}" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telepon</label>
                                                    <input type="number" name="phone" value="{{ $c->phone }}" class="form-control" required>
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

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapus-checker{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-checkerLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-checkerLabel">Hapus Dimensi {{ $c->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Apakah anda yakin ingin <br> menghapus data ini ?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('checker.hapus', $c->id) }}" class="btn btn-primary">Hapus</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Info akun -->
                                <div class="modal fade" id="info-akun{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-perusahaanLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title text-center" id="tambah-perusahaanLabel">Informasi Akun</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php
                                                $user = \App\User::where('id', $c->user_id)->first();
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-4">
                                                    USERNAME
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <b>: {{ $user->username }}</b>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    PASSWORD
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <b>: {{ $user->username }}</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<div class="modal fade" id="tambah-checker" tabindex="-1" role="dialog" aria-labelledby="tambah-checkerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="tambah-checkerLabel">Form Tambah Checker</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <form action="{{ route('checker.tambah') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="birthday" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" name="phone" class="form-control" required>
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
    
@endsection