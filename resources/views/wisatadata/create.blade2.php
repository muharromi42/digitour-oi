@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Wisata</h1>

        <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Dropdown Provinsi --}}
            <div class="form-group">
                <label for="iddest">Provinsi</label>
                <select name="iddest" id="iddest" class="form-control select2" required>
                    <option value="">Pilih Provinsi</option>
                    <option value="16" selected>Sumatera Selatan</option>
                </select>
            </div>

            {{-- Fitur-fitur wisata --}}
            @foreach (['Tempat Ibadah' => 'field44', 'Konsep 3R' => 'field45', 'Sistem Pengolahan Limbah' => 'field50'] as $label => $field)
                <div class="form-group mt-4">
                    <label>{{ $loop->iteration + 45 }}. {{ $label }}</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $field }}" id="{{ $field }}1"
                            value="Ada" checked>
                        <label class="form-check-label" for="{{ $field }}1">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $field }}" id="{{ $field }}0"
                            value="Tidak Ada">
                        <label class="form-check-label" for="{{ $field }}0">Tidak Ada</label>
                    </div>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input showhidereason" id="tiada{{ $field }}"
                            name="tiada{{ $field }}" value="1" data-shid="sh{{ $field }}">
                        <label for="tiada{{ $field }}">Tidak ada data</label>
                    </div>
                    <div class="d-none mt-2" id="sh{{ $field }}">
                        <input type="text" class="form-control" name="reason{{ $field }}"
                            placeholder="Penjelasan">
                    </div>
                </div>
            @endforeach

            {{-- Sumber Air Dinamis --}}
            <div class="form-group mt-4">
                <label for="field292">49. Sumber Air</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="field292_label[]" class="form-control mb-2"
                            placeholder="Pilih atau ketik baru">
                        <input type="text" name="field292[]" class="form-control" placeholder="Teks">
                    </div>
                </div>
                <a href="#" id="addfield292" class="btn btn-link">Tambah Record</a>
                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input showhidereason" id="tiadafield292" name="tiadafield292"
                        value="1" data-shid="shfield292">
                    <label for="tiadafield292">Tidak ada data</label>
                </div>
                <div class="d-none mt-2" id="shfield292">
                    <input type="text" class="form-control" name="reasonfield292" placeholder="Penjelasan">
                </div>
            </div>

            {{-- Upload Gambar --}}
            <div class="form-group mt-4">
                <label for="image">Foto Profil/Pendukung</label>
                <input type="file" name="image0" class="form-control mb-2">
                <input type="file" name="image1" class="form-control">
            </div>

            {{-- Identifikasi Responden --}}
            <h4 class="mt-5" id="linkresponden" style="color: #007bff">Identifikasi Responden</h4>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cp_nama">Nama Responden</label>
                        <input type="text" name="cp_nama" class="form-control" id="cp_nama">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cp_posisi">Jabatan Responden</label>
                        <input type="text" name="cp_posisi" class="form-control" id="cp_posisi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cp_phone">Nomor HP Responden</label>
                        <input type="text" name="cp_phone" class="form-control" id="cp_phone">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="{{ route('wisata.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
@endsection
