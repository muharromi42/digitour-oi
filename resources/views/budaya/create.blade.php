@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Budaya Baru</h5>
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

                <form action="{{ route('budaya.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Budaya</label>
                        <input type="file" name="foto[]" class="form-control" multiple required>
                        <small class="text-muted">Anda dapat memilih beberapa foto sekaligus (maksimal ukuran file: 2MB per
                            foto)</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('budaya.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </section>

@endsection
