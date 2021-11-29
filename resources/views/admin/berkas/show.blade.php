@extends('layouts.dashboard-admin')

@section('title', 'Halaman Detail berkas')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail berkas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail berkas</li>
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
                                <h3 class="card-title">Form Detail berkas</h3>
                            </div>
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="#" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">No
                                                    Berkas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->nomor_berkas }}" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama
                                                    Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->user->name }}" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Unit Lama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->mutasi->unit_lamaa->name ?? '' }}" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Unit Baru</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->mutasi->unit_baruu->name ?? '' }}" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status
                                                    Berkas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->status_berkas == 0 ? 'PENDING' : ($item->status_berkas == 1 ? 'DITOLAK' : 'DISETUJUI') }}"
                                                        readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->keterangan }}" readonly>

                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{ route('berkas.index') }} " class="btn btn-danger">Kembali</a>
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
