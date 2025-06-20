<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Data Wisata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .kop-surat {
            width: 120%;
            /* max-width: 100%; */
            height: auto;
            margin-bottom: 15px;
            display: block;
        }

        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .header h2 {
            color: #666;
            margin: 5px 0 0 0;
            font-size: 16px;
            font-weight: normal;
        }

        .section {
            margin-bottom: 20px;
            break-inside: avoid;
        }

        .section-title {
            background-color: #f8f9fa;
            color: #007bff;
            padding: 8px 12px;
            border-left: 4px solid #007bff;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .info-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .info-row {
            display: table-row;
        }

        .info-label {
            display: table-cell;
            width: 35%;
            padding: 6px 12px 6px 0;
            font-weight: bold;
            color: #555;
            vertical-align: top;
        }

        .info-value {
            display: table-cell;
            padding: 6px 0;
            border-bottom: 1px dotted #ddd;
            vertical-align: top;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .status-approve {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .json-list {
            margin: 0;
            padding-left: 15px;
        }

        .json-list li {
            margin-bottom: 2px;
        }

        .two-column {
            display: table;
            width: 100%;
        }

        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding-right: 15px;
        }

        .column:last-child {
            padding-right: 0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .page-break {
            page-break-before: always;
        }

        .financial-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .financial-table th,
        .financial-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .financial-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .capacity-grid {
            display: table;
            width: 100%;
            margin-top: 10px;
        }

        .capacity-row {
            display: table-row;
        }

        .capacity-cell {
            display: table-cell;
            width: 33.33%;
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
            font-weight: bold;
        }

        .capacity-header {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('storage/images/kop.png') }}" alt="Kop Surat" class="kop-surat">
        <h1>LAPORAN DATA WISATA</h1>
        <h2>{{ $wisata->nama_komersial }}</h2>
        {{-- <p style="margin: 10px 0 0 0; font-size: 12px;">
            Tanggal Cetak: {{ date('d F Y, H:i') }} WIB
        </p> --}}
    </div>

    <!-- Informasi Dasar -->
    <div class="section">
        <div class="section-title">Informasi Dasar</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Status Approval:</div>
                <div class="info-value">
                    <span class="status-badge status-{{ strtolower($wisata->approval) }}">
                        {{ $wisata->approval }}
                    </span>
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Komersial:</div>
                <div class="info-value">{{ $wisata->nama_komersial }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Perusahaan:</div>
                <div class="info-value">{{ $wisata->nama_perusahaan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Alamat:</div>
                <div class="info-value">{{ $wisata->alamat }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nomor Telepon:</div>
                <div class="info-value">{{ $wisata->nomor_telepon }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tahun Mulai Beroperasi:</div>
                <div class="info-value">{{ $wisata->tahun_mulai_beroperasi }}</div>
            </div>
            @if ($wisata->tematik_dtw)
                <div class="info-row">
                    <div class="info-label">Tematik DTW:</div>
                    <div class="info-value">
                        <ul class="json-list">
                            @foreach (json_decode($wisata->tematik_dtw, true) as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Informasi Area dan Operasional -->
    <div class="section">
        <div class="section-title">Informasi Area dan Operasional</div>
        <div class="two-column">
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Total Luas Area:</div>
                        <div class="info-value">{{ $wisata->total_luas_area ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Luas Area Wisata:</div>
                        <div class="info-value">{{ $wisata->luas_area_wisata ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jam Buka:</div>
                        <div class="info-value">{{ $wisata->jam_buka }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jam Tutup:</div>
                        <div class="info-value">{{ $wisata->jam_tutup }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Durasi Kunjungan:</div>
                        <div class="info-value">{{ $wisata->durasi_kunjungan ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Kapasitas Pengunjung:</div>
                        <div class="info-value">{{ number_format($wisata->kapasitas_pengunjung ?? 0) }} orang</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Dokumen Kapasitas:</div>
                        <div class="info-value">{{ $wisata->dokumen_kapasitas ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Pengunjung dan Tiket -->
    <div class="section">
        <div class="section-title">Data Pengunjung dan Tiket</div>
        <table class="financial-table">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Jumlah Pengunjung</th>
                    <th>Harga Tiket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nusantara</td>
                    <td>{{ number_format($wisata->pengunjung_nusantara ?? 0) }}</td>
                    <td>Rp {{ number_format($wisata->tiket_nusantara ?? 0) }}</td>
                </tr>
                <tr>
                    <td>Mancanegara</td>
                    <td>{{ number_format($wisata->pengunjung_mancanegara ?? 0) }}</td>
                    <td>Rp {{ number_format($wisata->tiket_mancanegara ?? 0) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Data Keuangan -->
    <div class="section">
        <div class="section-title">Data Keuangan</div>
        <div class="two-column">
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Pendapatan:</div>
                        <div class="info-value">Rp {{ number_format($wisata->pendapatan ?? 0) }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Pengeluaran:</div>
                        <div class="info-value">Rp {{ number_format($wisata->pengeluaran ?? 0) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Wisata -->
    <div class="section page-break">
        <div class="section-title">Fasilitas Wisata</div>

        @if ($wisata->museum_operasional)
            <div style="margin-bottom: 15px;">
                <strong>Museum Operasional:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->museum_operasional, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($wisata->aktivitas_alam)
            <div style="margin-bottom: 15px;">
                <strong>Aktivitas Alam:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->aktivitas_alam, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($wisata->wisata_alam)
            <div style="margin-bottom: 15px;">
                <strong>Wisata Alam:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->wisata_alam, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($wisata->wisata_buatan)
            <div style="margin-bottom: 15px;">
                <strong>Wisata Buatan:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->wisata_buatan, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($wisata->wisata_tirta)
            <div style="margin-bottom: 15px;">
                <strong>Wisata Tirta:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->wisata_tirta, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($wisata->hiburan_rekreasi)
            <div style="margin-bottom: 15px;">
                <strong>Hiburan Rekreasi:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->hiburan_rekreasi, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Sistem Pemesanan dan Pembayaran -->
    <div class="section">
        <div class="section-title">Sistem Pemesanan dan Pembayaran</div>

        @if ($wisata->metode_pemesanan)
            <div style="margin-bottom: 15px;">
                <strong>Metode Pemesanan:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->metode_pemesanan, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="margin-bottom: 15px;">
            <strong>Persentase Online:</strong> {{ $wisata->persentase_online ?? 0 }}%
        </div>

        @if ($wisata->metode_pembayaran)
            <div style="margin-bottom: 15px;">
                <strong>Metode Pembayaran:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->metode_pembayaran, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($wisata->sarana_promosi)
            <div style="margin-bottom: 15px;">
                <strong>Sarana Promosi:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->sarana_promosi, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <strong>Paket Wisata:</strong> {{ $wisata->paket_wisata ?? '-' }}
        </div>
    </div>

    <!-- Fasilitas Parkir -->
    <div class="section">
        <div class="section-title">Fasilitas Parkir</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Luas Area Parkir:</div>
                <div class="info-value">{{ $wisata->luas_area_parkir ?? '-' }}</div>
            </div>
        </div>

        <div class="capacity-grid">
            <div class="capacity-row">
                <div class="capacity-cell capacity-header">Motor</div>
                <div class="capacity-cell capacity-header">Mobil</div>
                <div class="capacity-cell capacity-header">Bus</div>
            </div>
            <div class="capacity-row">
                <div class="capacity-cell">{{ number_format($wisata->kapasitas_motor ?? 0) }}</div>
                <div class="capacity-cell">{{ number_format($wisata->kapasitas_mobil ?? 0) }}</div>
                <div class="capacity-cell">{{ number_format($wisata->kapasitas_bus ?? 0) }}</div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Toilet -->
    <div class="section">
        <div class="section-title">Fasilitas Toilet</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Jumlah Toilet Umum:</div>
                <div class="info-value">{{ $wisata->jumlah_toilet_umum ?? 0 }} unit</div>
            </div>
            <div class="info-row">
                <div class="info-label">Pembagian Toilet:</div>
                <div class="info-value">{{ $wisata->pembagian_toilet }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Toilet Khusus:</div>
                <div class="info-value">{{ $wisata->toilet_khusus }}</div>
            </div>
        </div>
    </div>

    <!-- Keamanan -->
    <div class="section">
        <div class="section-title">Sistem Keamanan</div>
        <div class="two-column">
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Prosedur SOP:</div>
                        <div class="info-value">{{ $wisata->prosedur_sop }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">SOP Keamanan Pengunjung:</div>
                        <div class="info-value">{{ $wisata->sop_keamanan_pengunjung }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jalur Evakuasi:</div>
                        <div class="info-value">{{ $wisata->jalur_evakuasi }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Asuransi Pengunjung:</div>
                        <div class="info-value">{{ $wisata->asuransi_pengunjung }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Pos Keamanan:</div>
                        <div class="info-value">{{ $wisata->pos_keamanan }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Kamera CCTV:</div>
                        <div class="info-value">{{ $wisata->kamera_cctv }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Pendukung -->
    <div class="section">
        <div class="section-title">Fasilitas Pendukung</div>
        <div class="two-column">
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Food Service:</div>
                        <div class="info-value">{{ $wisata->foodservice ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Signage:</div>
                        <div class="info-value">{{ $wisata->signage ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Pusat Informasi:</div>
                        <div class="info-value">{{ $wisata->pusat_informasi ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Kotak Saran:</div>
                        <div class="info-value">{{ $wisata->kotak_saran ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Tempat Ibadah:</div>
                        <div class="info-value">{{ $wisata->tempat_ibadah ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Konsep 3R:</div>
                        <div class="info-value">{{ $wisata->konsep_3r ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Sistem Pengolahan Limbah:</div>
                        <div class="info-value">{{ $wisata->sistem_pengolahan_limbah ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if ($wisata->sumberair)
            <div style="margin-top: 15px;">
                <strong>Sumber Air:</strong>
                <ul class="json-list">
                    @foreach (json_decode($wisata->sumberair, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Demographics (if available) -->
    @if ($wisata->pendidikan_label || $wisata->gender_label)
        <div class="section">
            <div class="section-title">Data Pendidikan Pekerja</div>
            <div class="two-column">
                @if ($wisata->pendidikan_label)
                    <div class="column">
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $wisata->pendidikan_label }}:</div>
                                <div class="info-value">{{ number_format($wisata->jumlah_pendidikan ?? 0) }}</div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($wisata->gender_label)
                    <div class="column">
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $wisata->gender_label }}:</div>
                                <div class="info-value">{{ number_format($wisata->jumlah_gender ?? 0) }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- Footer -->
    {{-- <div class="footer">
        <p>Laporan ini digenerate secara otomatis pada {{ date('d F Y, H:i') }} WIB</p>
        <p>Halaman {PAGE_NUM} dari {PAGE_COUNT}</p>
    </div> --}}
</body>

</html>
