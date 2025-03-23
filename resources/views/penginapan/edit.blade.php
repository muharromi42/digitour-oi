@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Penginapan</h5>
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

                <form action="{{ route('penginapan.update', $penginapan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $penginapan->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required>{{ $penginapan->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $penginapan->no_hp }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="waktu_kunjungan" class="form-label">Waktu Kunjungan</label>
                        <input type="text" name="waktu_kunjungan" class="form-control"
                            value="{{ $penginapan->waktu_kunjungan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ $penginapan->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="map" class="form-label">Link Map</label>
                        <input type="url" name="map" class="form-control" value="{{ $penginapan->map }}"
                            placeholder="https://maps.google.com/...">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Penginapan</label>
                        <input type="file" name="foto[]" class="form-control" multiple>
                        <small class="text-muted">Kosongkan jika tidak ingin menambah foto</small>
                        <br>

                        @if ($penginapan->foto)
                            <div class="mt-3">
                                <label class="form-label">Foto Saat Ini</label>
                                <div class="d-flex flex-wrap gap-3 edit-gallery">
                                    @foreach (json_decode($penginapan->foto) as $index => $path)
                                        <div class="position-relative border p-2">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="checkbox" name="delete_images[]"
                                                    value="{{ $index }}" id="delete_image_{{ $index }}">
                                                <label class="form-check-label" for="delete_image_{{ $index }}">
                                                    Hapus
                                                </label>
                                            </div>
                                            <a href="{{ asset('storage/' . $path) }}" class="image-popup"
                                                title="{{ $penginapan->judul }}">
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
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('penginapan.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            // For regular image popups (individual images)
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                image: {
                    verticalFit: true
                }
            });

            // Initialize Magnific Popup for DataTables after it's drawn
            $('#penginapanTable').on('draw.dt', function() {
                $('.gallery-container').each(function() {
                    $(this).magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0, 1]
                        }
                    });
                });
            });

            // For the edit form gallery
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

@endsection
