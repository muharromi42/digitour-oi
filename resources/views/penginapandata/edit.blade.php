@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Wisata</h1>

        <form action="{{ route('wisatadata.update', $wisatadata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Ada masalah dengan input Anda:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Nama Komersial Usaha --}}
            <div class="mb-3">
                <label for="nama_komersial" class="form-label">1. Nama Komersial Usaha <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_komersial" name="nama_komersial"
                    placeholder="Nama Komersial Usaha" value="{{ old('nama_komersial', $wisatadata->nama_komersial) }}"
                    required>
            </div>

            {{-- Tematik DTW --}}
            <div class="mb-3">
                <label for="tematik_dtw" class="form-label">2. Tematik DTW</label>
                <select name="tematik_dtw[]" id="tematik_dtw" class="form-select" multiple>
                    <option value="Wisata Alam"
                        {{ in_array('Wisata Alam', old('tematik_dtw', json_decode($wisatadata->tematik_dtw, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Alam</option>
                    <option value="Wisata Buatan"
                        {{ in_array('Wisata Buatan', old('tematik_dtw', json_decode($wisatadata->tematik_dtw, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Buatan</option>
                    <option value="Wisata Budaya"
                        {{ in_array('Wisata Budaya', old('tematik_dtw', json_decode($wisatadata->tematik_dtw, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Budaya</option>
                </select>
            </div>

            {{-- Nama Perusahaan / Usaha --}}
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">3. Nama Perusahaan / Usaha <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                    placeholder="Nama Perusahaan / Usaha" value="{{ old('nama_perusahaan', $wisatadata->nama_perusahaan) }}"
                    required>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">4. Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap"
                    value="{{ old('alamat', $wisatadata->alamat) }}" required>
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">5. Nomor Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Contoh: 08535412215" value="{{ old('nomor_telepon', $wisatadata->nomor_telepon) }}"
                    required>
            </div>

            {{-- Tahun Mulai Beroperasi --}}
            <div class="mb-3">
                <label for="tahun_mulai_beroperasi" class="form-label">6. Tahun Mulai Beroperasi <span
                        class="text-danger">*</span></label>
                <input type="number" class="form-control" id="tahun_mulai_beroperasi" name="tahun_mulai_beroperasi"
                    placeholder="Contoh: 1995"
                    value="{{ old('tahun_mulai_beroperasi', $wisatadata->tahun_mulai_beroperasi) }}" required>
            </div>

            {{-- Total Luas Area --}}
            <div class="mb-3">
                <label for="total_luas_area" class="form-label">7. Total Luas Area (m²)</label>
                <input type="text" class="form-control" id="total_luas_area" name="total_luas_area"
                    placeholder="Total Luas Area" value="{{ old('total_luas_area', $wisatadata->total_luas_area) }}">
            </div>

            {{-- Luas Area Wisata --}}
            <div class="mb-3">
                <label for="luas_area_wisata" class="form-label">8. Luas Area untuk Kegiatan Wisata (m²)</label>
                <input type="text" class="form-control" id="luas_area_wisata" name="luas_area_wisata"
                    placeholder="Luas Area Wisata" value="{{ old('luas_area_wisata', $wisatadata->luas_area_wisata) }}">
            </div>

            {{-- Jam Operasional --}}
            <div class="mb-3">
                <label class="form-label">9. Jam Operasional</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="jam_buka" id="jam_buka" class="form-control"
                            placeholder="Jam Buka (Contoh: 08:00)" value="{{ old('jam_buka', $wisatadata->jam_buka) }}"
                            required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="jam_tutup" id="jam_tutup" class="form-control"
                            placeholder="Jam Tutup (Contoh: 17:00)" value="{{ old('jam_tutup', $wisatadata->jam_tutup) }}"
                            required>
                    </div>
                </div>
            </div>

            {{-- Jumlah Pengunjung --}}
            <div class="mb-3">
                <label class="form-label">10. Jumlah Pengunjung / Bulan</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="pengunjung_nusantara" id="pengunjung_nusantara" class="form-control"
                            placeholder="Wisatawan Nusantara"
                            value="{{ old('pengunjung_nusantara', $wisatadata->pengunjung_nusantara) }}" min="0">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="pengunjung_mancanegara" id="pengunjung_mancanegara"
                            class="form-control" placeholder="Wisatawan Mancanegara"
                            value="{{ old('pengunjung_mancanegara', $wisatadata->pengunjung_mancanegara) }}"
                            min="0">
                    </div>
                </div>
                <small class="text-muted">* Data dari tahun terbaru</small>
            </div>

            <div class="mb-3">
                <label class="form-label">11. Harga Tiket Masuk</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="tiket_nusantara" class="form-control"
                            placeholder="Wisatawan Nusantara (Rp)"
                            value="{{ old('tiket_nusantara', $wisatadata->tiket_nusantara) }}" min="0">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="tiket_mancanegara" class="form-control"
                            placeholder="Wisatawan Mancanegara (Rp)"
                            value="{{ old('tiket_mancanegara', $wisatadata->tiket_mancanegara) }}" min="0">
                    </div>
                </div>
                <small class="text-muted">*Jika tidak ada tiket berbeda, samakan nilainya.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">12. Rata-Rata Lama/Durasi Kunjungan per Orang</label>
                <select class="form-select" name="durasi_kunjungan">
                    <option value="">Pilih salah satu</option>
                    <option value="24jam"
                        {{ old('durasi_kunjungan', $wisatadata->durasi_kunjungan) == '24jam' ? 'selected' : '' }}>24 jam
                    </option>
                    <option value=">1 jam s/d 6 jam"
                        {{ old('durasi_kunjungan', $wisatadata->durasi_kunjungan) == '>1 jam s/d 6 jam' ? 'selected' : '' }}>
                        &gt;1 jam s/d 6 jam</option>
                    <option value=">6 jam s/d 12 jam"
                        {{ old('durasi_kunjungan', $wisatadata->durasi_kunjungan) == '>6 jam s/d 12 jam' ? 'selected' : '' }}>
                        &gt;6 jam s/d 12 jam</option>
                    <option value=">12 jam s/d 18 jam"
                        {{ old('durasi_kunjungan', $wisatadata->durasi_kunjungan) == '>12 jam s/d 18 jam' ? 'selected' : '' }}>
                        &gt;12 jam s/d 18 jam</option>
                    <option value=">24 jam"
                        {{ old('durasi_kunjungan', $wisatadata->durasi_kunjungan) == '>24 jam' ? 'selected' : '' }}>&gt;24
                        jam
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">13. Terdapat Data/Dokumen Tentang Kapasitas Pengunjung</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dokumen_kapasitas" id="kapasitas_ada"
                            value="Ada Dokumen"
                            {{ old('dokumen_kapasitas', $wisatadata->dokumen_kapasitas) == 'Ada Dokumen' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kapasitas_ada">Ada Dokumen</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dokumen_kapasitas" id="kapasitas_tidak"
                            value="Tidak Ada Dokumen"
                            {{ old('dokumen_kapasitas', $wisatadata->dokumen_kapasitas) == 'Tidak Ada Dokumen' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kapasitas_tidak">Tidak Ada Dokumen</label>
                    </div>
                </div>
            </div>

            <h3 style="color: #007bff">Jumlah Pekera/Karyawan</h3>

            <div class="mb-3">
                <label for="kapasitas_pengunjung" class="form-label">14. Kapasitas Pengunjung</label>
                <input type="number" step="1" class="form-control" id="kapasitas_pengunjung"
                    name="kapasitas_pengunjung" placeholder="Jumlah maksimal orang"
                    value="{{ old('kapasitas_pengunjung', $wisatadata->kapasitas_pengunjung) }}">
                <small class="text-muted">*dalam satuan orang</small>
            </div>

            <div class="mb-4">
                <label for="pendidikan" class="form-label">15. Jumlah Pekerja/Karyawan Menurut Jenjang Pendidikan</label>
                <select class="form-select" name="pendidikan_label" id="pendidikan_label">
                    <option value="" {{ !old('pendidikan_label', $wisatadata->pendidikan_label) ? 'selected' : '' }}
                        disabled>Pilih Jenjang Pendidikan</option>
                    <option value="SMA"
                        {{ old('pendidikan_label', $wisatadata->pendidikan_label) == 'SMA' ? 'selected' : '' }}>SMA
                    </option>
                    <option value="D3"
                        {{ old('pendidikan_label', $wisatadata->pendidikan_label) == 'D3' ? 'selected' : '' }}>D3</option>
                    <option value="S1"
                        {{ old('pendidikan_label', $wisatadata->pendidikan_label) == 'S1' ? 'selected' : '' }}>S1</option>
                    <option value="S2"
                        {{ old('pendidikan_label', $wisatadata->pendidikan_label) == 'S2' ? 'selected' : '' }}>S2</option>
                    <option value="S3"
                        {{ old('pendidikan_label', $wisatadata->pendidikan_label) == 'S3' ? 'selected' : '' }}>S3</option>
                    <option value="Lainnya"
                        {{ old('pendidikan_label', $wisatadata->pendidikan_label) == 'Lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
                <input type="number" class="form-control mt-2" name="jumlah_pendidikan" id="jumlah_pendidikan"
                    placeholder="Jumlah pekerja" value="{{ old('jumlah_pendidikan', $wisatadata->jumlah_pendidikan) }}">
            </div>

            <div class="mb-4">
                <label for="gender" class="form-label">16. Jumlah Pekerja/Karyawan Menurut Jenis Kelamin</label>
                <select class="form-select" name="gender_label" id="gender_label">
                    <option value="" {{ !old('gender_label', $wisatadata->gender_label) ? 'selected' : '' }}
                        disabled>
                        Pilih Jenis Kelamin</option>
                    <option value="Laki-laki"
                        {{ old('gender_label', $wisatadata->gender_label) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan"
                        {{ old('gender_label', $wisatadata->gender_label) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                    <option value="Lainnya"
                        {{ old('gender_label', $wisatadata->gender_label) == 'Lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
                <input type="number" class="form-control mt-2" name="jumlah_gender" id="jumlah_gender"
                    placeholder="Jumlah pekerja" value="{{ old('jumlah_gender', $wisatadata->jumlah_gender) }}">
            </div>

            <h3 style="color: #007bff">Pendapatan dan Pengeluaran</h3>

            <div class="col-md-12 col-sm-12 mt-4 addborder float-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-form-label">
                                17. Pendapatan dan Pengeluaran Dalam Satu Tahun
                            </label>

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <input type="number" class="form-control" name="pendapatan" id="pendapatan"
                                        placeholder="Pendapatan (Rp)"
                                        value="{{ old('pendapatan', $wisatadata->pendapatan) }}" min="0"
                                        step="1000">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <input type="number" class="form-control" name="pengeluaran" id="pengeluaran"
                                        placeholder="Pengeluaran (Rp)"
                                        value="{{ old('pengeluaran', $wisatadata->pengeluaran) }}" min="0"
                                        step="1000">
                                </div>
                            </div>
                            <p class="mt-1">*dalam Rp (Rupiah)</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 style="color: #007bff">Jenis Kegiatan</h3>

            <div class="form-group mt-4">
                <label for="museum_operasional" class="form-label">
                    18. Museum, Operasional Bangunan, dan Situs Bersejarah
                </label>

                <select name="museum_operasional[]" id="museum_operasional" class="form-select select2" multiple>
                    <option value="Peninggalan sejarah"
                        {{ in_array('Peninggalan sejarah', old('museum_operasional', json_decode($wisatadata->museum_operasional, true) ?? [])) ? 'selected' : '' }}>
                        Peninggalan sejarah</option>
                    <option value="Taman Budaya"
                        {{ in_array('Taman Budaya', old('museum_operasional', json_decode($wisatadata->museum_operasional, true) ?? [])) ? 'selected' : '' }}>
                        Taman Budaya</option>
                    <option value="Wisata Budaya Lainnya"
                        {{ in_array('Wisata Budaya Lainnya', old('museum_operasional', json_decode($wisatadata->museum_operasional, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Budaya Lainnya</option>
                    <option value="Museum"
                        {{ in_array('Museum', old('museum_operasional', json_decode($wisatadata->museum_operasional, true) ?? [])) ? 'selected' : '' }}>
                        Museum</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="aktivitas_alam" class="form-label">
                    19. Aktivitas Kebun Binatang, Taman Botani, dan Cadangan Alam
                </label>

                <select name="aktivitas_alam[]" id="aktivitas_alam" class="form-select select2" multiple>
                    <option value="Taman Konservasi di Luar Habitat Alami (Ex-Situ)"
                        {{ in_array('Taman Konservasi di Luar Habitat Alami (Ex-Situ)', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Taman Konservasi di Luar Habitat Alami (Ex-Situ)</option>
                    <option value="Aktivitas Kawasan Alam Lainnya"
                        {{ in_array('Aktivitas Kawasan Alam Lainnya', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Aktivitas Kawasan Alam Lainnya</option>
                    <option value="Hutan Lindung"
                        {{ in_array('Hutan Lindung', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Hutan Lindung</option>
                    <option value="Kawasan Buru"
                        {{ in_array('Kawasan Buru', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Kawasan Buru</option>
                    <option value="Suaka Margasatwa & Cagar Alam"
                        {{ in_array('Suaka Margasatwa & Cagar Alam', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Suaka Margasatwa & Cagar Alam</option>
                    <option value="Taman Hutan Raya"
                        {{ in_array('Taman Hutan Raya', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Taman Hutan Raya</option>
                    <option value="Taman Konservasi"
                        {{ in_array('Taman Konservasi', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Taman Konservasi</option>
                    <option value="Taman Laut"
                        {{ in_array('Taman Laut', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Taman Laut</option>
                    <option value="Taman Nasional"
                        {{ in_array('Taman Nasional', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Taman Nasional</option>
                    <option value="Taman Wisata Alam"
                        {{ in_array('Taman Wisata Alam', old('aktivitas_alam', json_decode($wisatadata->aktivitas_alam, true) ?? [])) ? 'selected' : '' }}>
                        Taman Wisata Alam</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="wisata_alam" class="form-label">
                    20. Daya Tarik Wisata Alam
                </label>

                <select name="wisata_alam[]" id="wisata_alam" class="form-select select2" multiple>
                    <option value="Aktifitas Taman Bertema/Taman Hiburan"
                        {{ in_array('Aktifitas Taman Bertema/Taman Hiburan', old('wisata_alam', json_decode($wisatadata->wisata_alam, true) ?? [])) ? 'selected' : '' }}>
                        Aktifitas Taman Bertema/Taman Hiburan</option>
                    <option value="Pemandian Alam"
                        {{ in_array('Pemandian Alam', old('wisata_alam', json_decode($wisatadata->wisata_alam, true) ?? [])) ? 'selected' : '' }}>
                        Pemandian Alam</option>
                    <option value="Wisata Gua"
                        {{ in_array('Wisata Gua', old('wisata_alam', json_decode($wisatadata->wisata_alam, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Gua</option>
                    <option value="Wisata Pantai"
                        {{ in_array('Wisata Pantai', old('wisata_alam', json_decode($wisatadata->wisata_alam, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Pantai</option>
                    <option value="Wisata Petualangan Alam"
                        {{ in_array('Wisata Petualangan Alam', old('wisata_alam', json_decode($wisatadata->wisata_alam, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Petualangan Alam</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="wisata_buatan" class="form-label">
                    21. Daya Tarik Wisata Buatan / Binaan Manusia
                </label>

                <select name="wisata_buatan[]" id="wisata_buatan" class="form-select select2" multiple>
                    <option value="Daya Tarik Wisata Buatan / Binaan Manusia Lainnya"
                        {{ in_array('Daya Tarik Wisata Buatan / Binaan Manusia Lainnya', old('wisata_buatan', json_decode($wisatadata->wisata_buatan, true) ?? [])) ? 'selected' : '' }}>
                        Daya Tarik Wisata Buatan / Binaan Manusia Lainnya</option>
                    <option value="Kolam Pemancingan"
                        {{ in_array('Kolam Pemancingan', old('wisata_buatan', json_decode($wisatadata->wisata_buatan, true) ?? [])) ? 'selected' : '' }}>
                        Kolam Pemancingan</option>
                    <option value="Taman Rekreasi/Taman Wisata"
                        {{ in_array('Taman Rekreasi/Taman Wisata', old('wisata_buatan', json_decode($wisatadata->wisata_buatan, true) ?? [])) ? 'selected' : '' }}>
                        Taman Rekreasi/Taman Wisata</option>
                    <option value="Wisata Agro"
                        {{ in_array('Wisata Agro', old('wisata_buatan', json_decode($wisatadata->wisata_buatan, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Agro</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="wisata_tirta" class="form-label">
                    22. Wisata Tirta
                </label>

                <select name="wisata_tirta[]" id="wisata_tirta" class="form-select select2" multiple>
                    <option value="Aktivitas Wisata Air"
                        {{ in_array('Aktivitas Wisata Air', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Aktivitas Wisata Air</option>
                    <option value="Arung Jeram"
                        {{ in_array('Arung Jeram', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Arung Jeram</option>
                    <option value="Dermaga Marina"
                        {{ in_array('Dermaga Marina', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Dermaga Marina</option>
                    <option value="Kolam Pemancingan"
                        {{ in_array('Kolam Pemancingan', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Kolam Pemancingan</option>
                    <option value="Wisata Memancing"
                        {{ in_array('Wisata Memancing', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Memancing</option>
                    <option value="Wisata Selam"
                        {{ in_array('Wisata Selam', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Selam</option>
                    <option value="Wisata Tirta Lainnya"
                        {{ in_array('Wisata Tirta Lainnya', old('wisata_tirta', json_decode($wisatadata->wisata_tirta, true) ?? [])) ? 'selected' : '' }}>
                        Wisata Tirta Lainnya</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="hiburan_rekreasi" class="form-label">
                    23. Aktivitas Hiburan & Rekreasi
                </label>
                <select name="hiburan_rekreasi[]" id="hiburan_rekreasi" class="form-select select2" multiple>
                    <option value="Aktifitas Hiburan & Rekreasi Lainnya"
                        {{ in_array('Aktifitas Hiburan & Rekreasi Lainnya', old('hiburan_rekreasi', json_decode($wisatadata->hiburan_rekreasi, true) ?? [])) ? 'selected' : '' }}>
                        Aktifitas Hiburan & Rekreasi Lainnya</option>
                    <option value="Usaha Arena Permainan"
                        {{ in_array('Usaha Arena Permainan', old('hiburan_rekreasi', json_decode($wisatadata->hiburan_rekreasi, true) ?? [])) ? 'selected' : '' }}>
                        Usaha Arena Permainan</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <h3 style="color: #007bff">Operasional</h3>

            <div class="form-group mt-4">
                <label for="metode_pemesanan" class="form-label">
                    24. Metode Pemesanan / Penjualan Tiket
                </label>
                <select name="metode_pemesanan[]" id="metode_pemesanan" class="form-select select2" multiple>
                    <option value="Langsung di Lokasi"
                        {{ in_array('Langsung di Lokasi', old('metode_pemesanan', json_decode($wisatadata->metode_pemesanan, true) ?? [])) ? 'selected' : '' }}>
                        Langsung di Lokasi</option>
                    <option value="Media Sosial"
                        {{ in_array('Media Sosial', old('metode_pemesanan', json_decode($wisatadata->metode_pemesanan, true) ?? [])) ? 'selected' : '' }}>
                        Media Sosial</option>
                    <option value="Pihak Ketiga :Traveloka/Tiket.com/dsb"
                        {{ in_array('Pihak Ketiga :Traveloka/Tiket.com/dsb', old('metode_pemesanan', json_decode($wisatadata->metode_pemesanan, true) ?? [])) ? 'selected' : '' }}>
                        Pihak Ketiga: Traveloka/Tiket.com/dsb</option>
                    <option value="Website"
                        {{ in_array('Website', old('metode_pemesanan', json_decode($wisatadata->metode_pemesanan, true) ?? [])) ? 'selected' : '' }}>
                        Website</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="persentase_online" class="form-label">
                    25. Persentase Tiket Terjual Melalui Internet/Online (%) Selama Tahun Ini
                </label>
                <input type="number" name="persentase_online" id="persentase_online" class="form-control"
                    placeholder="Contoh: 70" value="{{ old('persentase_online', $wisatadata->persentase_online) }}">
                <small class="form-text text-muted">*Isikan dalam angka persen tanpa simbol %</small>
            </div>

            <div class="form-group mt-4">
                <label for="metode_pembayaran" class="form-label">
                    26. Metode Pembayaran Tiket
                </label>
                <select name="metode_pembayaran[]" id="metode_pembayaran" class="form-select select2" multiple>
                    <option value="Debit : Tarnsfer/Q-Ris/EDC"
                        {{ in_array('Debit : Tarnsfer/Q-Ris/EDC', old('metode_pembayaran', json_decode($wisatadata->metode_pembayaran, true) ?? [])) ? 'selected' : '' }}>
                        Debit: Transfer / QRIS / EDC</option>
                    <option value="Kartu Kredit"
                        {{ in_array('Kartu Kredit', old('metode_pembayaran', json_decode($wisatadata->metode_pembayaran, true) ?? [])) ? 'selected' : '' }}>
                        Kartu Kredit</option>
                    <option value="Tunai"
                        {{ in_array('Tunai', old('metode_pembayaran', json_decode($wisatadata->metode_pembayaran, true) ?? [])) ? 'selected' : '' }}>
                        Tunai</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="sarana_promosi" class="form-label">
                    27. Sarana Promosi / Iklan Yang Selama Ini Dilakukan
                </label>
                <select name="sarana_promosi[]" id="sarana_promosi" class="form-select select2" multiple>
                    <option value="Media Cetak : Koran/ Buletin/dsb"
                        {{ in_array('Media Cetak : Koran/ Buletin/dsb', old('sarana_promosi', json_decode($wisatadata->sarana_promosi, true) ?? [])) ? 'selected' : '' }}>
                        Media Cetak: Koran / Buletin / dsb</option>
                    <option value="Media Elektronik: Radio/Televisi/dsb"
                        {{ in_array('Media Elektronik: Radio/Televisi/dsb', old('sarana_promosi', json_decode($wisatadata->sarana_promosi, true) ?? [])) ? 'selected' : '' }}>
                        Media Elektronik: Radio / Televisi / dsb</option>
                    <option value="Media Sosial : Facebook/Youtube/Tiktok/dsb"
                        {{ in_array('Media Sosial : Facebook/Youtube/Tiktok/dsb', old('sarana_promosi', json_decode($wisatadata->sarana_promosi, true) ?? [])) ? 'selected' : '' }}>
                        Media Sosial: Facebook / YouTube / TikTok / dsb</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label class="form-label">
                    28. Ada/Tidaknya Paket Wisata
                </label>

                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="paket_wisata" id="paket_wisata_ada"
                        value="Ada" {{ old('paket_wisata', $wisatadata->paket_wisata) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="paket_wisata_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="paket_wisata" id="paket_wisata_tidak"
                        value="Tidak Ada"
                        {{ old('paket_wisata', $wisatadata->paket_wisata) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="paket_wisata_tidak">Tidak Ada</label>
                </div>
            </div>

            <h3 style="color: #007bff">Fasilitas</h3>

            <div class="form-group mt-4">
                <label for="luas_area_parkir" class="form-label">29. Luas Area Parkir</label>
                <input type="text" class="form-control mt-2" id="luas_area_parkir" name="luas_area_parkir"
                    placeholder="Contoh: 500" value="{{ old('luas_area_parkir', $wisatadata->luas_area_parkir) }}">
                <small class="text-muted">*dalam m²</small>
            </div>

            <div class="form-group mt-4">
                <label for="kapasitas_motor" class="form-label">30. Kapasitas Parkir Sepeda Motor</label>
                <input type="number" step="1" class="form-control mt-2" id="kapasitas_motor"
                    name="kapasitas_motor" placeholder="Contoh: 100"
                    value="{{ old('kapasitas_motor', $wisatadata->kapasitas_motor) }}">
                <small class="text-muted">*dalam unit</small>
            </div>

            <div class="form-group mt-4">
                <label for="kapasitas_mobil" class="form-label">31. Kapasitas Parkir Mobil</label>
                <input type="number" step="1" class="form-control mt-2" id="kapasitas_mobil"
                    name="kapasitas_mobil" placeholder="Contoh: 50"
                    value="{{ old('kapasitas_mobil', $wisatadata->kapasitas_mobil) }}">
                <small class="text-muted">*dalam unit</small>
            </div>

            <div class="form-group mt-4">
                <label for="kapasitas_bus" class="form-label">32. Kapasitas Parkir Bus</label>
                <input type="number" step="1" class="form-control mt-2" id="kapasitas_bus" name="kapasitas_bus"
                    placeholder="Contoh: 10" value="{{ old('kapasitas_bus', $wisatadata->kapasitas_bus) }}">
                <small class="text-muted">*dalam unit</small>
            </div>

            <h3 style="color: #007bff">Sanitasi </h3>

            <div class="form-group mt-4">
                <label for="jumlah_toilet_umum" class="form-label">33. Jumlah Toilet Umum</label>
                <input type="number" step="1" class="form-control" id="jumlah_toilet_umum"
                    name="jumlah_toilet_umum" placeholder="Jumlah Toilet Umum"
                    value="{{ old('jumlah_toilet_umum', $wisatadata->jumlah_toilet_umum) }}">
                <small class="text-muted">*dalam unit</small>
            </div>

            <div class="form-group mt-4">
                <label class="form-label d-block">34. Ada Pembagian Antara Toilet Laki-laki dan Perempuan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pembagian_toilet" id="pembagian_ada"
                        value="Ada"
                        {{ old('pembagian_toilet', $wisatadata->pembagian_toilet) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pembagian_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pembagian_toilet" id="pembagian_tidak_ada"
                        value="Tidak Ada"
                        {{ old('pembagian_toilet', $wisatadata->pembagian_toilet) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pembagian_tidak_ada">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group mt-4">
                <label class="form-label d-block">35. Tersedia Toilet Khusus Disabilitas dan Lansia</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="toilet_khusus" id="toilet_khusus_ada"
                        value="Ada" {{ old('toilet_khusus', $wisatadata->toilet_khusus) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="toilet_khusus_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="toilet_khusus" id="toilet_khusus_tidak_ada"
                        value="Tidak Ada"
                        {{ old('toilet_khusus', $wisatadata->toilet_khusus) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="toilet_khusus_tidak_ada">Tidak Ada</label>
                </div>
            </div>

            <h3 style="color: #007bff">Keamanan</h3>

            <!-- 36. Prosedur Kerja Penyelenggaraan Kegiatan (SOP) -->
            <div class="form-group mt-4">
                <label class="form-label d-block">36. Prosedur Kerja Penyelenggaraan Kegiatan (SOP)</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="prosedur_sop" id="prosedur_sop_ada"
                        value="Ada" {{ old('prosedur_sop', $wisatadata->prosedur_sop) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="prosedur_sop_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="prosedur_sop" id="prosedur_sop_tidak"
                        value="Tidak Ada"
                        {{ old('prosedur_sop', $wisatadata->prosedur_sop) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="prosedur_sop_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 37. SOP Keamanan Pengunjung -->
            <div class="form-group mt-4">
                <label class="form-label d-block">37. SOP Keamanan Pengunjung</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sop_keamanan_pengunjung"
                        id="sop_keamanan_pengunjung_ada" value="Ada"
                        {{ old('sop_keamanan_pengunjung', $wisatadata->sop_keamanan_pengunjung) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sop_keamanan_pengunjung_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sop_keamanan_pengunjung"
                        id="sop_keamanan_pengunjung_tidak" value="Tidak Ada"
                        {{ old('sop_keamanan_pengunjung', $wisatadata->sop_keamanan_pengunjung) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sop_keamanan_pengunjung_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 38. Jalur Evakuasi -->
            <div class="form-group mt-4">
                <label class="form-label d-block">38. Jalur Evakuasi</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jalur_evakuasi" id="jalur_evakuasi_ada"
                        value="Ada"
                        {{ old('jalur_evakuasi', $wisatadata->jalur_evakuasi) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jalur_evakuasi_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jalur_evakuasi" id="jalur_evakuasi_tidak"
                        value="Tidak Ada"
                        {{ old('jalur_evakuasi', $wisatadata->jalur_evakuasi) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jalur_evakuasi_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 39. Asuransi Pengunjung -->
            <div class="form-group mt-4">
                <label class="form-label d-block">39. Asuransi Pengunjung</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="asuransi_pengunjung"
                        id="asuransi_pengunjung_ada" value="Ada"
                        {{ old('asuransi_pengunjung', $wisatadata->asuransi_pengunjung) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="asuransi_pengunjung_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="asuransi_pengunjung"
                        id="asuransi_pengunjung_tidak" value="Tidak Ada"
                        {{ old('asuransi_pengunjung', $wisatadata->asuransi_pengunjung) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="asuransi_pengunjung_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 40. Pos Keamanan -->
            <div class="form-group mt-4">
                <label class="form-label d-block">40. Pos Keamanan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pos_keamanan" id="pos_keamanan_ada"
                        value="Ada" {{ old('pos_keamanan', $wisatadata->pos_keamanan) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pos_keamanan_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pos_keamanan" id="pos_keamanan_tidak"
                        value="Tidak Ada"
                        {{ old('pos_keamanan', $wisatadata->pos_keamanan) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pos_keamanan_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 41. Kamera Pengawas/CCTV -->
            <div class="form-group mt-4">
                <label class="form-label d-block">41. Kamera Pengawas/CCTV</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kamera_cctv" id="kamera_cctv_ada"
                        value="Ada" {{ old('kamera_cctv', $wisatadata->kamera_cctv) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="kamera_cctv_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kamera_cctv" id="kamera_cctv_tidak"
                        value="Tidak Ada"
                        {{ old('kamera_cctv', $wisatadata->kamera_cctv) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="kamera_cctv_tidak">Tidak Ada</label>
                </div>
            </div>

            <h3 style="color: #007bff">Makanan dan Minuman </h3>

            <div class="mb-3">
                <label for="foodservice" class="form-label"> 42. Ketersediaan Jasa Makanan dan Minuman (kios, tenant, dsb)
                    di Dalam Destinasi </label>
                <input type="text" class="form-control" id="foodservice" name="foodservice"
                    placeholder="foodservice" value="{{ old('foodservice', $wisatadata->foodservice) }}" required>
            </div>

            <h3 style="color: #007bff">Signage</h3>

            <div class="form-group mt-4">
                <label class="form-label d-block">
                    43. Ada/Tidaknya Signage
                </label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="signage" id="signage_ada" value="Ada"
                        {{ old('signage', $wisatadata->signage) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="signage_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="signage" id="signage_tidak_ada"
                        value="Tidak Ada" {{ old('signage', $wisatadata->signage) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="signage_tidak_ada">Tidak Ada</label>
                </div>
            </div>

            <h3 style="color: #007bff">Lainnya</h3>

            <!-- 44. Pusat Informasi -->
            <div class="form-group mt-4">
                <label class="form-label d-block">44. Pusat Informasi</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pusat_informasi" id="pusat_informasi_ada"
                        value="Ada"
                        {{ old('pusat_informasi', $wisatadata->pusat_informasi) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pusat_informasi_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pusat_informasi" id="pusat_informasi_tidak"
                        value="Tidak Ada"
                        {{ old('pusat_informasi', $wisatadata->pusat_informasi) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pusat_informasi_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 45. Kotak Saran -->
            <div class="form-group mt-4">
                <label class="form-label d-block">45. Kotak Saran</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kotak_saran" id="kotak_saran_ada"
                        value="Ada" {{ old('kotak_saran', $wisatadata->kotak_saran) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="kotak_saran_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kotak_saran" id="kotak_saran_tidak"
                        value="Tidak Ada"
                        {{ old('kotak_saran', $wisatadata->kotak_saran) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="kotak_saran_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 46. Tempat Ibadah -->
            <div class="form-group mt-4">
                <label class="form-label d-block">46. Tempat Ibadah</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tempat_ibadah" id="tempat_ibadah_ada"
                        value="Ada" {{ old('tempat_ibadah', $wisatadata->tempat_ibadah) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="tempat_ibadah_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tempat_ibadah" id="tempat_ibadah_tidak"
                        value="Tidak Ada"
                        {{ old('tempat_ibadah', $wisatadata->tempat_ibadah) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="tempat_ibadah_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 47. Konsep 3R (Reduce, Reuse, Recycle) -->
            <div class="form-group mt-4">
                <label class="form-label d-block">47. Apakah Memberlakukan Konsep 3R (Reduce, Reuse, Recycle)</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="konsep_3r" id="konsep_3r_ada" value="Ada"
                        {{ old('konsep_3r', $wisatadata->konsep_3r) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="konsep_3r_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="konsep_3r" id="konsep_3r_tidak"
                        value="Tidak Ada" {{ old('konsep_3r', $wisatadata->konsep_3r) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="konsep_3r_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 48. Sistem Pengolahan Limbah -->
            <div class="form-group mt-4">
                <label class="form-label d-block">48. Sistem Pengolahan Limbah</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sistem_pengolahan_limbah"
                        id="sistem_pengolahan_limbah_ada" value="Ada"
                        {{ old('sistem_pengolahan_limbah', $wisatadata->sistem_pengolahan_limbah) == 'Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sistem_pengolahan_limbah_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sistem_pengolahan_limbah"
                        id="sistem_pengolahan_limbah_tidak" value="Tidak Ada"
                        {{ old('sistem_pengolahan_limbah', $wisatadata->sistem_pengolahan_limbah) == 'Tidak Ada' ? 'checked' : '' }}>
                    <label class="form-check-label" for="sistem_pengolahan_limbah_tidak">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="sumberair" class="form-label">
                    49. Sumber Air
                </label>

                <select name="sumberair[]" id="sumberair" class="form-select select2" multiple>
                    <option value="PDAM"
                        {{ in_array('PDAM', old('sumberair', is_array($wisatadata->sumberair ?? []) ? $wisatadata->sumberair : json_decode($wisatadata->sumberair ?? '[]', true))) ? 'selected' : '' }}>
                        PDAM
                    </option>
                    <option value="Pegunungan"
                        {{ in_array('Pegunungan', old('sumberair', is_array($wisatadata->sumberair ?? []) ? $wisatadata->sumberair : json_decode($wisatadata->sumberair ?? '[]', true))) ? 'selected' : '' }}>
                        Pegunungan
                    </option>
                    <option value="Sumur"
                        {{ in_array('Sumur', old('sumberair', is_array($wisatadata->sumberair ?? []) ? $wisatadata->sumberair : json_decode($wisatadata->sumberair ?? '[]', true))) ? 'selected' : '' }}>
                        Sumur
                    </option>
                    <option value="Lainnya"
                        {{ in_array('Lainnya', old('sumberair', is_array($wisatadata->sumberair ?? []) ? $wisatadata->sumberair : json_decode($wisatadata->sumberair ?? '[]', true))) ? 'selected' : '' }}>
                        Lainnya
                    </option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('wisata.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
@endsection
