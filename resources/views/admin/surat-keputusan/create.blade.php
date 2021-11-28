@extends('layouts.dashboard-admin')

@section('title', 'Halaman Tambah surat keputusan')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Surat Keputusan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Surat Keputusan</li>
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
                                <h3 class="card-title">Form Tambah surat keputusan</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="{{ route('surat.keputusan.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <select name="user_id" id="user_id"
                                                        class="form-control @error('user_id') is-invalid @enderror">
                                                        <option value="">-- Pilih Karyawan --</option>
                                                        @foreach ($karyawan as $kar)
                                                            <option value="{{ $kar->id }}" @if (old('user_id') == $kar->id) selected="selected" @endif>
                                                                {{ $kar->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Silahkan Pilih Nama Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Unit Lama</label>
                                                <div class="col-sm-8">
                                                    <select name="unit_lama" id="unit_lama"
                                                        class="form-control @error('unit_lama') is-invalid @enderror">
                                                        <option value="">-- Pilih Unit Lama --</option>
                                                        @foreach ($unit as $unit_lama)
                                                            <option value="{{ $unit_lama->id }}" @if (old('unit_lama') == $unit_lama->id) selected="selected" @endif>
                                                                {{ $unit_lama->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Silahkan Pilih Unit Lama Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Unit Baru</label>
                                                <div class="col-sm-8">
                                                    <select name="unit_baru" id="unit_baru"
                                                        class="form-control @error('unit_baru') is-invalid @enderror">
                                                        <option value="">-- Pilih Unit Baru --</option>
                                                        @foreach ($unit as $unit_baru)
                                                            <option value="{{ $unit_baru->id }}" @if (old('unit_baru') == $unit_baru->id) selected="selected" @endif>
                                                                {{ $unit_baru->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Silahkan Pilih Unit Baru Karyawan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select name="status" id="status"
                                                        class="form-control @error('status') is-invalid @enderror">
                                                        <option value="">-- Pilih Status --</option>
                                                        <option value="Penugasan Sementara">Penugasan Sementara</option>
                                                        <option value="Rotasi">Rotasi</option>
                                                        <option value="Promosi">Promosi</option>
                                                        <option value="Penempatan Karyawan Baru">Penempatan Karyawan Baru
                                                        </option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Silahkan Pilih Status
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="keterangan"
                                                        class="form-control @error('keterangan') is-invalid @enderror"
                                                        id="inputEmail3" placeholder="Ketarangan"
                                                        value="{{ old('keterangan') }}">
                                                    <div class="invalid-feedback">
                                                        Masukan Keterangan
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

@push('down-script')
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
s
@endpush
