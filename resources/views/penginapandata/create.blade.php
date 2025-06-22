@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Penginapan</h1>

        <form action="{{ route('penginapandata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                    placeholder="Nama Komersial Usaha" required>
            </div>


            {{-- Nama Perusahaan / Usaha --}}
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">2. Nama Perusahaan / Usaha <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                    placeholder="Nama Perusahaan / Usaha" required>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">3. Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap"
                    required>
            </div>

            {{-- Nomor Telepon --}}
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">4. Nomor Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Contoh: 08535412215" required>
            </div>

            {{-- Tahun Mulai Beroperasi --}}
            <div class="mb-3">
                <label for="tahun_mulai_beroperasi" class="form-label">5. Tahun Mulai Beroperasi <span
                        class="text-danger">*</span></label>
                <input type="number" class="form-control" id="tahun_mulai_beroperasi" name="tahun_mulai_beroperasi"
                    placeholder="Contoh: 1995" required>
            </div>

            {{-- Total Luas Area --}}
            <div class="mb-3">
                <label for="total_luas_area" class="form-label">6. Total Luas Area (m²)</label>
                <input type="text" class="form-control" id="total_luas_area" name="total_luas_area"
                    placeholder="Total Luas Area">
            </div>

            {{-- Jam Operasional --}}
            <div class="mb-3">
                <label class="form-label">8. Jam Operasional</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="jam_buka" id="jam_buka" class="form-control"
                            placeholder="Jam Buka (Contoh: 08:00)" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="jam_tutup" id="jam_tutup" class="form-control"
                            placeholder="Jam Tutup (Contoh: 17:00)" required>
                    </div>
                </div>
            </div>

            {{-- Jumlah Pengunjung --}}
            <div class="mb-3">
                <label class="form-label">9. Jumlah Pengunjung / Bulan</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="pengunjung_nusantara" id="pengunjung_nusantara" class="form-control"
                            placeholder="Wisatawan Nusantara" min="0">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="pengunjung_mancanegara" id="pengunjung_mancanegara" class="form-control"
                            placeholder="Wisatawan Mancanegara" min="0">
                    </div>
                </div>
                <small class="text-muted">* Data dari tahun terbaru</small>
            </div>

            <div class="mb-3">
                <label for="harga_hotel_suite" class="form-label">10. Harga Permalam hotel suite</label>
                <input type="text" class="form-control" id="harga_hotel_suite" name="harga_hotel_suite"
                    placeholder="Total Luas Area">
            </div>

            <div class="mb-3">
                <label for="harga_hotel_non_suite" class="form-label">11. Harga Permalam hotel non suite</label>
                <input type="text" class="form-control" id="harga_hotel_non_suite" name="harga_hotel_non_suite"
                    placeholder="Total Luas Area">
            </div>

            <div class="mb-3">
                <label for="harga_hotel_non_bintang" class="form-label">12. Harga Permalam hotel non bintang</label>
                <input type="text" class="form-control" id="harga_hotel_non_bintang" name="harga_hotel_non_bintang"
                    placeholder="Total Luas Area">
            </div>

            <div class="mb-3">
                <label for="jumlah_kamar" class="form-label">13. Jumlah Kamar</label>
                <input type="text" class="form-control" id="jumlah_kamar" name="jumlah_kamar"
                    placeholder="Total Luas Area">
            </div>


            <div class="mb-3">
                <label class="form-label">11. Harga Tiket Masuk</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="tiket_nusantara" class="form-control"
                            placeholder="Wisatawan Nusantara (Rp)" min="0">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="tiket_mancanegara" class="form-control"
                            placeholder="Wisatawan Mancanegara (Rp)" min="0">
                    </div>
                </div>
                <small class="text-muted">*Jika tidak ada tiket berbeda, samakan nilainya.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">12. Rata-Rata Lama/Durasi Kunjungan per Orang</label>
                <select class="form-select" name="durasi_kunjungan">
                    <option value="">Pilih salah satu</option>
                    <option value="24jam">24 jam</option>
                    <option value=">1 jam s/d 6 jam">&gt;1 jam s/d 6 jam</option>
                    <option value=">6 jam s/d 12 jam">&gt;6 jam s/d 12 jam</option>
                    <option value=">12 jam s/d 18 jam">&gt;12 jam s/d 18 jam</option>
                    <option value=">24 jam">&gt;24 jam</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">13. Terdapat Data/Dokumen Tentang Kapasitas Pengunjung</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dokumen_kapasitas" id="kapasitas_ada"
                            value="Ada Dokumen">
                        <label class="form-check-label" for="kapasitas_ada">Ada Dokumen</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dokumen_kapasitas" id="kapasitas_tidak"
                            value="Tidak Ada Dokumen">
                        <label class="form-check-label" for="kapasitas_tidak">Tidak Ada Dokumen</label>
                    </div>
                </div>
            </div>

            <h3 style="color: #007bff">Jumlah Pekera/Karyawan</h3>

            <div class="mb-3">
                <label for="kapasitas_pengunjung" class="form-label">14. Kapasitas Pengunjung</label>
                <input type="number" step="1" class="form-control" id="kapasitas_pengunjung"
                    name="kapasitas_pengunjung" placeholder="Jumlah maksimal orang">
                <small class="text-muted">*dalam satuan orang</small>
            </div>

            <div class="mb-4">
                <label for="pendidikan" class="form-label">15. Jumlah Pekerja/Karyawan Menurut Jenjang Pendidikan</label>
                <select class="form-select" name="pendidikan_label" id="pendidikan_label">
                    <option value="" selected disabled>Pilih Jenjang Pendidikan</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="number" class="form-control mt-2" name="jumlah_pendidikan" id="jumlah_pendidikan"
                    placeholder="Jumlah pekerja">
            </div>


            <div class="mb-4">
                <label for="gender" class="form-label">16. Jumlah Pekerja/Karyawan Menurut Jenis Kelamin</label>
                <select class="form-select" name="gender_label" id="gender_label">
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="number" class="form-control mt-2" name="jumlah_gender" id="jumlah_gender"
                    placeholder="Jumlah pekerja">
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
                                        placeholder="Pendapatan (Rp)" min="0" step="1000">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <input type="number" class="form-control" name="pengeluaran" id="pengeluaran"
                                        placeholder="Pengeluaran (Rp)" min="0" step="1000">
                                </div>
                            </div>
                            <p class="mt-1">*dalam Rp (Rupiah)</p>
                        </div>
                    </div>
                </div>
            </div>



            <h3 style="color: #007bff">Operasional</h3>


            <div class="form-group mt-4">
                <label for="metode_pemesanan" class="form-label">
                    24. Metode Pemesanan / Penjualan Tiket
                </label>
                <select name="metode_pemesanan[]" id="metode_pemesanan" class="form-select select2" multiple>
                    <option value="Langsung di Lokasi">Langsung di Lokasi</option>
                    <option value="Media Sosial">Media Sosial</option>
                    <option value="Pihak Ketiga :Traveloka/Tiket.com/dsb">Pihak Ketiga: Traveloka/Tiket.com/dsb</option>
                    <option value="Website">Website</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>


            <div class="form-group mt-4">
                <label for="persentase_online" class="form-label">
                    25. Persentase Tiket Terjual Melalui Internet/Online (%) Selama Tahun Ini
                </label>
                <input type="number" name="persentase_online" id="persentase_online" class="form-control"
                    placeholder="Contoh: 70">
                <small class="form-text text-muted">*Isikan dalam angka persen tanpa simbol %</small>
            </div>

            <div class="form-group mt-4">
                <label for="metode_pembayaran" class="form-label">
                    26. Metode Pembayaran Tiket
                </label>
                <select name="metode_pembayaran[]" id="metode_pembayaran" class="form-select select2" multiple>
                    <option value="Debit : Tarnsfer/Q-Ris/EDC">Debit: Transfer / QRIS / EDC</option>
                    <option value="Kartu Kredit">Kartu Kredit</option>
                    <option value="Tunai">Tunai</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label for="sarana_promosi" class="form-label">
                    27. Sarana Promosi / Iklan Yang Selama Ini Dilakukan
                </label>
                <select name="sarana_promosi[]" id="sarana_promosi" class="form-select select2" multiple>
                    <option value="Media Cetak : Koran/ Buletin/dsb">Media Cetak: Koran / Buletin / dsb</option>
                    <option value="Media Elektronik: Radio/Televisi/dsb">Media Elektronik: Radio / Televisi / dsb</option>
                    <option value="Media Sosial : Facebook/Youtube/Tiktok/dsb">Media Sosial: Facebook / YouTube / TikTok /
                        dsb</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>

            <div class="form-group mt-4">
                <label class="form-label">
                    28. Ada/Tidaknya Paket Wisata
                </label>

                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="paket_wisata" id="paket_wisata_ada"
                        value="Ada">
                    <label class="form-check-label" for="paket_wisata_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="paket_wisata" id="paket_wisata_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="paket_wisata_tidak">Tidak Ada</label>
                </div>
            </div>



            <h3 style="color: #007bff">Fasilitas</h3>

            <div class="form-group mt-4">
                <label for="luas_area_parkir" class="form-label">29. Luas Area Parkir</label>
                <input type="text" class="form-control mt-2" id="luas_area_parkir" name="luas_area_parkir"
                    placeholder="Contoh: 500">
                <small class="text-muted">*dalam m²</small>
            </div>

            <div class="form-group mt-4">
                <label for="kapasitas_motor" class="form-label">30. Kapasitas Parkir Sepeda Motor</label>
                <input type="number" step="1" class="form-control mt-2" id="kapasitas_motor"
                    name="kapasitas_motor" placeholder="Contoh: 100">
                <small class="text-muted">*dalam unit</small>
            </div>

            <div class="form-group mt-4">
                <label for="kapasitas_mobil" class="form-label">31. Kapasitas Parkir Mobil</label>
                <input type="number" step="1" class="form-control mt-2" id="kapasitas_mobil"
                    name="kapasitas_mobil" placeholder="Contoh: 50">
                <small class="text-muted">*dalam unit</small>
            </div>


            <div class="form-group mt-4">
                <label for="kapasitas_bus" class="form-label">32. Kapasitas Parkir Bus</label>
                <input type="number" step="1" class="form-control mt-2" id="kapasitas_bus" name="kapasitas_bus"
                    placeholder="Contoh: 10">
                <small class="text-muted">*dalam unit</small>
            </div>

            <h3 style="color: #007bff">Sanitasi </h3>

            <div class="form-group mt-4">
                <label for="jumlah_toilet_umum" class="form-label">33. Jumlah Toilet Umum</label>
                <input type="number" step="1" class="form-control" id="jumlah_toilet_umum"
                    name="jumlah_toilet_umum" placeholder="Jumlah Toilet Umum">
                <small class="text-muted">*dalam unit</small>
            </div>

            <div class="form-group mt-4">
                <label class="form-label d-block">34. Ada Pembagian Antara Toilet Laki-laki dan Perempuan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pembagian_toilet" id="pembagian_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="pembagian_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pembagian_toilet" id="pembagian_tidak_ada"
                        value="Tidak Ada">
                    <label class="form-check-label" for="pembagian_tidak_ada">Tidak Ada</label>
                </div>
            </div>


            <div class="form-group mt-4">
                <label class="form-label d-block">35. Tersedia Toilet Khusus Disabilitas dan Lansia</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="toilet_khusus" id="toilet_khusus_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="toilet_khusus_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="toilet_khusus" id="toilet_khusus_tidak_ada"
                        value="Tidak Ada">
                    <label class="form-check-label" for="toilet_khusus_tidak_ada">Tidak Ada</label>
                </div>

            </div>



            <h3 style="color: #007bff">Keamanan</h3>

            <!-- 36. Prosedur Kerja Penyelenggaraan Kegiatan (SOP) -->
            <div class="form-group mt-4">
                <label class="form-label d-block">36. Prosedur Kerja Penyelenggaraan Kegiatan (SOP)</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="prosedur_sop" id="prosedur_sop_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="prosedur_sop_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="prosedur_sop" id="prosedur_sop_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="prosedur_sop_tidak">Tidak Ada</label>
                </div>

            </div>

            <!-- 37. SOP Keamanan Pengunjung -->
            <div class="form-group mt-4">
                <label class="form-label d-block">37. SOP Keamanan Pengunjung</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sop_keamanan_pengunjung"
                        id="sop_keamanan_pengunjung_ada" value="Ada" checked>
                    <label class="form-check-label" for="sop_keamanan_pengunjung_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sop_keamanan_pengunjung"
                        id="sop_keamanan_pengunjung_tidak" value="Tidak Ada">
                    <label class="form-check-label" for="sop_keamanan_pengunjung_tidak">Tidak Ada</label>
                </div>

            </div>

            <!-- 38. Jalur Evakuasi -->
            <div class="form-group mt-4">
                <label class="form-label d-block">38. Jalur Evakuasi</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jalur_evakuasi" id="jalur_evakuasi_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="jalur_evakuasi_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jalur_evakuasi" id="jalur_evakuasi_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="jalur_evakuasi_tidak">Tidak Ada</label>
                </div>

            </div>

            <!-- 39. Asuransi Pengunjung -->
            <div class="form-group mt-4">
                <label class="form-label d-block">39. Asuransi Pengunjung</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="asuransi_pengunjung"
                        id="asuransi_pengunjung_ada" value="Ada" checked>
                    <label class="form-check-label" for="asuransi_pengunjung_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="asuransi_pengunjung"
                        id="asuransi_pengunjung_tidak" value="Tidak Ada">
                    <label class="form-check-label" for="asuransi_pengunjung_tidak">Tidak Ada</label>
                </div>

            </div>

            <!-- 40. Pos Keamanan -->
            <div class="form-group mt-4">
                <label class="form-label d-block">40. Pos Keamanan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pos_keamanan" id="pos_keamanan_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="pos_keamanan_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pos_keamanan" id="pos_keamanan_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="pos_keamanan_tidak">Tidak Ada</label>
                </div>

            </div>

            <!-- 41. Kamera Pengawas/CCTV -->
            <div class="form-group mt-4">
                <label class="form-label d-block">41. Kamera Pengawas/CCTV</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kamera_cctv" id="kamera_cctv_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="kamera_cctv_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kamera_cctv" id="kamera_cctv_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="kamera_cctv_tidak">Tidak Ada</label>
                </div>

            </div>

            <h3 style="color: #007bff">Makanan dan Minuman </h3>

            <div class="mb-3">
                <label for="foodservice" class="form-label"> 42. Ketersediaan Jasa Makanan dan Minuman (kios, tenant, dsb)
                    di
                    Dalam Destinasi </label>
                <input type="text" class="form-control" id="foodservice" name="foodservice"
                    placeholder="foodservice" required>
            </div>

            <h3 style="color: #007bff">Signage</h3>

            <div class="form-group mt-4">
                <label class="form-label d-block">
                    43. Ada/Tidaknya Signage
                </label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="signage" id="signage_ada" value="Ada"
                        checked>
                    <label class="form-check-label" for="signage_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="signage" id="signage_tidak_ada"
                        value="Tidak Ada">
                    <label class="form-check-label" for="signage_tidak_ada">Tidak Ada</label>
                </div>
            </div>

            <h3 style="color: #007bff">Lainnya</h3>

            <!-- 44. Pusat Informasi -->
            <div class="form-group mt-4">
                <label class="form-label d-block">44. Pusat Informasi</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pusat_informasi" id="pusat_informasi_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="pusat_informasi_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pusat_informasi" id="pusat_informasi_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="pusat_informasi_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 45. Kotak Saran -->
            <div class="form-group mt-4">
                <label class="form-label d-block">45. Kotak Saran</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kotak_saran" id="kotak_saran_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="kotak_saran_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kotak_saran" id="kotak_saran_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="kotak_saran_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 46. Tempat Ibadah -->
            <div class="form-group mt-4">
                <label class="form-label d-block">46. Tempat Ibadah</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tempat_ibadah" id="tempat_ibadah_ada"
                        value="Ada" checked>
                    <label class="form-check-label" for="tempat_ibadah_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tempat_ibadah" id="tempat_ibadah_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="tempat_ibadah_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 47. Konsep 3R (Reduce, Reuse, Recycle) -->
            <div class="form-group mt-4">
                <label class="form-label d-block">47. Apakah Memberlakukan Konsep 3R (Reduce, Reuse, Recycle)</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="konsep_3r" id="konsep_3r_ada" value="Ada"
                        checked>
                    <label class="form-check-label" for="konsep_3r_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="konsep_3r" id="konsep_3r_tidak"
                        value="Tidak Ada">
                    <label class="form-check-label" for="konsep_3r_tidak">Tidak Ada</label>
                </div>
            </div>

            <!-- 48. Sistem Pengolahan Limbah -->
            <div class="form-group mt-4">
                <label class="form-label d-block">48. Sistem Pengolahan Limbah</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sistem_pengolahan_limbah"
                        id="sistem_pengolahan_limbah_ada" value="Ada" checked>
                    <label class="form-check-label" for="sistem_pengolahan_limbah_ada">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sistem_pengolahan_limbah"
                        id="sistem_pengolahan_limbah_tidak" value="Tidak Ada">
                    <label class="form-check-label" for="sistem_pengolahan_limbah_tidak">Tidak Ada</label>
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="sumberair" class="form-label">
                    49. Sumber Air
                </label>

                <select name="sumberair[]" id="sumberair" class="form-select select2" multiple>
                    <option value="PDAM">PDAM</option>
                    <option value="Pegunungan">Pegunungan</option>
                    <option value="Sumur">Sumur</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <small class="form-text text-muted">*Dapat dipilih lebih dari satu</small>
            </div>



            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="{{ route('wisata.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
@endsection
