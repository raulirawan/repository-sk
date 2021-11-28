@extends('layouts.dashboard-admin')

@section('title', 'Halaman Tambah karyawan')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah karyawan</li>
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
                                <h3 class="card-title">Form Tambah karyawan</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="{{ route('karyawan.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Nama Karyawan"
                                                        value="{{ old('name') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan Nama Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">NIP
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="nip"
                                                        class="form-control @error('nip') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="NIP Karyawan"
                                                        value="{{ old('nip') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan NIP Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Email Karyawan"
                                                        value="{{ old('email') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan Email Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-8">
                                                    <select name="jabatan_id" id="jabatan_id"
                                                        class="form-control @error('jabatan_id') is-invalid @enderror">
                                                        <option value="">-- Pilih Jabatan --</option>
                                                        @foreach ($jabatan as $jabs)
                                                            <option value="{{ $jabs->id }}" @if (old('jabatan_id') == $jabs->id) selected="selected" @endif>
                                                                {{ $jabs->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Masukan Jabatan Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Unit</label>
                                                <div class="col-sm-8">
                                                    <select name="unit_id" id="unit_id"
                                                        class="form-control @error('unit_id') is-invalid @enderror">
                                                        <option value="">-- Pilih Jabatan --</option>
                                                        @foreach ($unit as $unt)
                                                            <option value="{{ $unt->id }}" @if (old('unit_id') == $unt->id) selected="selected" @endif>
                                                                {{ $unt->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Masukan Unit Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="tanggal_lahir"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Tanggal Lahir"
                                                        value="{{ old('tanggal_lahir') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan Tanggal Lahir
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="tempat_lahir"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Tempat Lahir"
                                                        value="{{ old('tempat_lahir') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan Tempat Lahir
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <textarea name="alamat" id="alamat"
                                                        class="form-control  @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                                    <div class="invalid-feedback">
                                                        Masukan Alamat
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Foto
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="file" name="profile_photo_url"
                                                        class="form-control @error('profile_photo_url') is-invalid @enderror"
                                                        id="inputEmail3" value="{{ old('profile_photo_url') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan Foto Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
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
