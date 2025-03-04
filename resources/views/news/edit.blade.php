@extends('layouts.app')

@section('content')
    <h1>Edit News</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $news->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $news->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $news->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
            <br>
            <img src="{{ asset('storage/' . $news->foto) }}" width="100px">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
