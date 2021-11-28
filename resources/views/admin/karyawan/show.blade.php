@extends('layouts.dashboard-admin')

@section('title', 'Halaman Detail karyawan')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail karyawan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Detail karyawan</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="{{ route('karyawan.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" value="{{ $item->name }}"
                                                        readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">NIP
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="nip"
                                                        class="form-control @error('nip') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="NIP Karyawan"
                                                        value="{{ $item->nip }}" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nip"
                                                        class="form-control @error('nip') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="NIP Karyawan"
                                                        value="{{ $item->jabatan->name }}" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Unit</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nip"
                                                        class="form-control @error('nip') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="NULL"
                                                        value="{{ $item->unit->name ?? '' }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="tanggal_lahir"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Tanggal Lahir"
                                                        value="{{ $item->tanggal_lahir->format('Y-m-d') }}" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="tempat_lahir"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Tempat Lahir"
                                                        value="{{ $item->tempat_lahir }}" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="tempat_lahir"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Tempat Lahir"
                                                        value="{{ $item->roles }}" readonly>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat" id="alamat"
                                                        class="form-control  @error('alamat') is-invalid @enderror"
                                                        readonly>{{ $item->alamat }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{ $item->profile_photo_url == null ? url('img/people.jpg') : Storage::url($item->profile_photo_url) }}"
                                                alt="" style="max-width: 200px">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{ route('karyawan.index') }} " class="btn btn-danger">Kembali</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
