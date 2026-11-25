@extends('layouts.app')

@section('breadcrumb')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="mb-0 fs-3">Praktikum</h1>
        </div>
        <div class="col-sm-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('praktikum.index') }}">Praktikum</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-md-4">
                            <h3 class="card-title">Tambah Praktikum</h3>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                <a href="{{ route('praktikum.index') }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-arrow-left-circle me-1" aria-hidden="true"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('praktikum.store') }}" method="POST">
                        @csrf

                        @include('praktikum.form')

                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                            <a href="{{ route('praktikum.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1" aria-hidden="true"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1" aria-hidden="true"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection