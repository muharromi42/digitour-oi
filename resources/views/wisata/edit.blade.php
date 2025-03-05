@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Wisata</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $wisata->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ $wisata->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $wisata->no_hp }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jam_buka" class="form-label">Jam Buka</label>
                        <input type="text" name="jam_buka" class="form-control" value="{{ $wisata->jam_buka }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control" value="{{ $wisata->kota }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Wisata</label>
                        <input type="file" name="foto" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                        <br>
                        @if ($wisata->foto)
                            <img src="{{ asset('storage/' . $wisata->foto) }}" class="mt-2" width="200px">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </section>

@endsection
