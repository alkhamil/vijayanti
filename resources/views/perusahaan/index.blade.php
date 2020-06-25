@extends('layouts.app')

@section('content')
<div class="app-title">
    <div>
        <h1>Perusahaan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active">Perusahaan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-perusahaan">
            <i class="fa fa-plus"></i> Tambah Perusahaan
        </button>
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
                                <th>Nama</th>
                                <th>Wilayah</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $key => $c)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->region }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->phone }}</td>
                                    <td>{{ $c->address }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit-perusahaan{{ $c->id }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button data-toggle="modal" data-target="#hapus-perusahaan{{ $c->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit-perusahaan{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-perusahaanLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="tambah-perusahaanLabel">Form Edit Perusahaan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('perusahaan.edit') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="company_id" value="{{ $c->id }}">
                                            <div class="form-group">
                                                <label>Nama Perusahaan</label>
                                                <input type="text" name="name" value="{{ $c->name }}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Wilayah</label>
                                                <input type="text" name="region" value="{{ $c->region }}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="number" name="phone" value="{{ $c->phone }}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{ $c->email }}" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="address" class="form-control" cols="10" rows="5">{{ $c->address }}</textarea>
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

                                <!-- Modal hapus -->
                                <div class="modal fade" id="hapus-perusahaan{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="tambah-perusahaanLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="tambah-perusahaanLabel">Hapus Perusahaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Apakah anda yakin ingin <br> menghapus data ini ?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{ route('perusahaan.hapus', $c->id) }}" class="btn btn-primary">Hapus</a>
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
<div class="modal fade" id="tambah-perusahaan" tabindex="-1" role="dialog" aria-labelledby="tambah-perusahaanLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="tambah-perusahaanLabel">Form Tambah Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <form action="{{ route('perusahaan.tambah') }}" method="POST">
        @csrf
        <div class="modal-body">
           <div class="form-group">
               <label>Nama Perusahaan</label>
               <input type="text" name="name" class="form-control" required>
           </div>
           <div class="form-group">
               <label>Wilayah</label>
               <input type="text" name="region" class="form-control" required>
           </div>
           <div class="form-group">
               <label>Telepon</label>
               <input type="number" name="phone" class="form-control" required>
           </div>
           <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
           <div class="form-group">
               <label>Alamat</label>
               <textarea name="address" class="form-control" cols="10" rows="5"></textarea>
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