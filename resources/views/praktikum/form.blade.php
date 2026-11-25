<div class="mb-3">
    <label for="periode_id" class="form-label">Periode</label>
    <select id="periode_id" name="periode_id" class="form-select @error('periode_id') is-invalid @enderror">
        <option value="">-- Pilih periode --</option>
        @foreach ($semua_periode as $periode)
            <option value="{{ $periode->id }}"
                @selected(old('periode_id', $praktikum->periode_id ?? '') == $periode->id)>
                {{ $periode->periode }}
            </option>
        @endforeach
    </select>
    @error('periode_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode"
            value="{{ old('kode', $praktikum->kode ?? '') }}" placeholder="contoh: PW1" />
        @error('kode')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-8 mb-3">
        <label for="nama" class="form-label">Nama Praktikum</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $praktikum->nama ?? '') }}" placeholder="contoh: Pemrograman Web 1" />
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <select id="semester" name="semester" class="form-select @error('semester') is-invalid @enderror">
        <option value="">-- Pilih semester --</option>
        @foreach (\App\Models\Praktikum::SEMESTER as $semester)
            <option value="{{ $semester }}" @selected(old('semester', $praktikum->semester ?? '') == $semester)>
                Semester {{ $semester }}
            </option>
        @endforeach
    </select>
    @error('semester')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label d-block">Sifat</label>
    @foreach (\App\Models\Praktikum::SIFAT as $sifat)
        <div class="form-check form-check-inline">
            <input class="form-check-input @error('sifat') is-invalid @enderror" type="radio" name="sifat"
                id="sifat-{{ $loop->index }}" value="{{ $sifat }}"
                @checked(old('sifat', $praktikum->sifat ?? '') === $sifat) />
            <label class="form-check-label" for="sifat-{{ $loop->index }}">{{ $sifat }}</label>
        </div>
    @endforeach
    @error('sifat')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>