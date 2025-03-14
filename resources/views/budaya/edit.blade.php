@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Budaya</h5>
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

                <form action="{{ route('budaya.update', $budaya->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $budaya->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ $budaya->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Tambah Foto Budaya</label>
                        <input type="file" name="foto[]" class="form-control" multiple>
                        <small class="text-muted">Kosongkan jika tidak ingin menambah foto baru</small>
                    </div>

                    @if ($budaya->foto)
                        <div class="mt-3">
                            <label class="form-label">Foto Saat Ini</label>
                            <div class="d-flex flex-wrap gap-3 edit-gallery">
                                @foreach (json_decode($budaya->foto) as $index => $path)
                                    <div class="position-relative border p-2">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" name="delete_images[]"
                                                value="{{ $index }}" id="delete_image_{{ $index }}">
                                            <label class="form-check-label" for="delete_image_{{ $index }}">
                                                Hapus
                                            </label>
                                        </div>
                                        <a href="{{ asset('storage/' . $path) }}" class="image-popup"
                                            title="{{ $budaya->judul }}">
                                            <img src="{{ asset('storage/' . $path) }}" width="100px" height="100px"
                                                class="img-thumbnail" style="object-fit: cover;">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <small class="text-muted">Centang kotak di atas gambar untuk menghapus. Klik gambar untuk
                                melihat ukuran penuh.</small>
                        </div>
                    @else
                        <p class="mt-2">Tidak ada foto</p>
                    @endif

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('budaya.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initialize Magnific Popup for the edit gallery
                $('.edit-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1]
                    }
                });
            });
        </script>
    @endpush

@endsection
