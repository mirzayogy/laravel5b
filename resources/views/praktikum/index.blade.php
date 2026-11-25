@extends('layouts.app')

@section('breadcrumb')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="mb-0 fs-3">Praktikum</h1>
        </div>
        <div class="col-sm-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item active" aria-current="page">Praktikum</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-md-4">
                            <h3 class="card-title">Praktikum</h3>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                <a href="{{ route('praktikum.create') }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-plus-circle me-1" aria-hidden="true"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kode</th>
                                <th>Nama Praktikum</th>
                                <th>Periode</th>
                                <th>Semester</th>
                                <th>Sifat</th>
                                <th style="width: 40px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($semua_praktikum as $praktikum)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $praktikum->kode }}</td>
                                    <td>{{ $praktikum->nama }}</td>
                                    <td>{{ $praktikum->periode->periode }}</td>
                                    <td>{{ $praktikum->semester }}</td>
                                    <td>
                                        @if ($praktikum->sifat === 'Wajib')
                                            <span class="badge text-bg-primary">Wajib</span>
                                        @else
                                            <span class="badge text-bg-info">Pilihan</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('praktikum.edit', $praktikum) }}"
                                                class="btn btn-outline-secondary" aria-label="Ubah {{ $praktikum->nama }}">
                                                <i class="bi bi-pencil" aria-hidden="true"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#modal-hapus-{{ $praktikum->id }}"
                                                aria-label="Hapus {{ $praktikum->nama }}">
                                                <i class="bi bi-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        {{-- @include('praktikum.modal-hapus') --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary">Belum ada data praktikum.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection