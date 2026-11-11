@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-md-4">
                            <h3 class="card-title">Tambah Periode</h3>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                <a href="{{ route('periode.index') }}" type="button" class="btn btn-sm btn-primary">
                                    <i class="bi bi-arrow-left-circle me-1" aria-hidden="true"> </i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="periode" class="form-label"> Periode </label>
                            <input type="text" class="form-control" id="periode" name="periode" placeholder="contoh: GANJIL 2025/2026"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="singkatan" class="form-label"> Singkatan </label>
                            <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="251"
                                required />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="status" name="status" />
                            <label class="form-check-label" for="new-user-welcome">
                                Status Aktif
                            </label>
                        </div>
                        <div class="d-flex flex-wrap justify-content-md-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1" aria-hidden="true"> </i>
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1" aria-hidden="true"> </i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
