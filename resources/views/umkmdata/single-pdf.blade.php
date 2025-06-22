<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Data UMKM</title>
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
        <h1>LAPORAN DATA UMKM</h1>
        <h2>{{ $umkm->nama_komersial }}</h2>
    </div>

    <!-- Informasi Dasar -->
    <div class="section">
        <div class="section-title">Informasi Dasar</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Status Approval:</div>
                <div class="info-value">
                    <span class="status-badge status-{{ strtolower($umkm->approval) }}">
                        {{ $umkm->approval }}
                    </span>
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Komersial:</div>
                <div class="info-value">{{ $umkm->nama_komersial }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Perusahaan:</div>
                <div class="info-value">{{ $umkm->nama_perusahaan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Alamat:</div>
                <div class="info-value">{{ $umkm->alamat }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nomor Telepon:</div>
                <div class="info-value">{{ $umkm->nomor_telepon }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tahun Mulai Beroperasi:</div>
                <div class="info-value">{{ $umkm->tahun_mulai_beroperasi }}</div>
            </div>
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
                        <div class="info-value">{{ $umkm->total_luas_area ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Luas Area Wisata:</div>
                        <div class="info-value">{{ $umkm->luas_area_wisata ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jam Buka:</div>
                        <div class="info-value">{{ $umkm->jam_buka }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jam Tutup:</div>
                        <div class="info-value">{{ $umkm->jam_tutup }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Kapasitas Pengunjung:</div>
                        <div class="info-value">{{ number_format($umkm->kapasitas_pengunjung ?? 0) }} orang</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Dokumen Kapasitas:</div>
                        <div class="info-value">{{ $umkm->dokumen_kapasitas ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jenis Produk:</div>
                        <div class="info-value">{{ $umkm->jenis_produk ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Harga Produk:</div>
                        <div class="info-value">{{ $umkm->harga_produk ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Pengunjung -->
    <div class="section">
        <div class="section-title">Data Pengunjung</div>
        <table class="financial-table">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nusantara</td>
                    <td>{{ number_format($umkm->pengunjung_nusantara ?? 0) }}</td>
                </tr>
                <tr>
                    <td>Mancanegara</td>
                    <td>{{ number_format($umkm->pengunjung_mancanegara ?? 0) }}</td>
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
                        <div class="info-value">Rp {{ number_format($umkm->pendapatan ?? 0) }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Pengeluaran:</div>
                        <div class="info-value">Rp {{ number_format($umkm->pengeluaran ?? 0) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sistem Pemesanan dan Pembayaran -->
    <div class="section page-break">
        <div class="section-title">Sistem Pemesanan dan Pembayaran</div>

        @if ($umkm->metode_pemesanan)
            <div style="margin-bottom: 15px;">
                <strong>Metode Pemesanan:</strong>
                <ul class="json-list">
                    @foreach (json_decode($umkm->metode_pemesanan, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="margin-bottom: 15px;">
            <strong>Persentase Online:</strong> {{ $umkm->persentase_online ?? 0 }}%
        </div>

        @if ($umkm->metode_pembayaran)
            <div style="margin-bottom: 15px;">
                <strong>Metode Pembayaran:</strong>
                <ul class="json-list">
                    @foreach (json_decode($umkm->metode_pembayaran, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($umkm->sarana_promosi)
            <div style="margin-bottom: 15px;">
                <strong>Sarana Promosi:</strong>
                <ul class="json-list">
                    @foreach (json_decode($umkm->sarana_promosi, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <strong>Paket Wisata:</strong> {{ $umkm->paket_wisata ?? '-' }}
        </div>
    </div>

    <!-- Fasilitas Parkir -->
    <div class="section">
        <div class="section-title">Fasilitas Parkir</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Luas Area Parkir:</div>
                <div class="info-value">{{ $umkm->luas_area_parkir ?? '-' }}</div>
            </div>
        </div>

        <div class="capacity-grid">
            <div class="capacity-row">
                <div class="capacity-cell capacity-header">Motor</div>
                <div class="capacity-cell capacity-header">Mobil</div>
                <div class="capacity-cell capacity-header">Bus</div>
            </div>
            <div class="capacity-row">
                <div class="capacity-cell">{{ number_format($umkm->kapasitas_motor ?? 0) }}</div>
                <div class="capacity-cell">{{ number_format($umkm->kapasitas_mobil ?? 0) }}</div>
                <div class="capacity-cell">{{ number_format($umkm->kapasitas_bus ?? 0) }}</div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Toilet -->
    <div class="section">
        <div class="section-title">Fasilitas Toilet</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Jumlah Toilet Umum:</div>
                <div class="info-value">{{ $umkm->jumlah_toilet_umum ?? 0 }} unit</div>
            </div>
            <div class="info-row">
                <div class="info-label">Pembagian Toilet:</div>
                <div class="info-value">{{ $umkm->pembagian_toilet }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Toilet Khusus:</div>
                <div class="info-value">{{ $umkm->toilet_khusus }}</div>
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
                        <div class="info-value">{{ $umkm->prosedur_sop }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">SOP Keamanan Pengunjung:</div>
                        <div class="info-value">{{ $umkm->sop_keamanan_pengunjung }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Jalur Evakuasi:</div>
                        <div class="info-value">{{ $umkm->jalur_evakuasi }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Asuransi Pengunjung:</div>
                        <div class="info-value">{{ $umkm->asuransi_pengunjung }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Pos Keamanan:</div>
                        <div class="info-value">{{ $umkm->pos_keamanan }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Kamera CCTV:</div>
                        <div class="info-value">{{ $umkm->kamera_cctv }}</div>
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
                        <div class="info-value">{{ $umkm->foodservice ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Signage:</div>
                        <div class="info-value">{{ $umkm->signage ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Pusat Informasi:</div>
                        <div class="info-value">{{ $umkm->pusat_informasi ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Kotak Saran:</div>
                        <div class="info-value">{{ $umkm->kotak_saran ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="info-grid">
                    <div class="info-row">
                        <div class="info-label">Tempat Ibadah:</div>
                        <div class="info-value">{{ $umkm->tempat_ibadah ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Konsep 3R:</div>
                        <div class="info-value">{{ $umkm->konsep_3r ?? '-' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Sistem Pengolahan Limbah:</div>
                        <div class="info-value">{{ $umkm->sistem_pengolahan_limbah ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if ($umkm->sumberair)
            <div style="margin-top: 15px;">
                <strong>Sumber Air:</strong>
                <ul class="json-list">
                    @foreach (json_decode($umkm->sumberair, true) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Demographics (if available) -->
    @if ($umkm->pendidikan_label || $umkm->gender_label)
        <div class="section">
            <div class="section-title">Data Pendidikan Pekerja</div>
            <div class="two-column">
                @if ($umkm->pendidikan_label)
                    <div class="column">
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $umkm->pendidikan_label }}:</div>
                                <div class="info-value">{{ number_format($umkm->jumlah_pendidikan ?? 0) }}</div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($umkm->gender_label)
                    <div class="column">
                        <div class="info-grid">
                            <div class="info-row">
                                <div class="info-label">{{ $umkm->gender_label }}:</div>
                                <div class="info-value">{{ number_format($umkm->jumlah_gender ?? 0) }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

</body>

</html>
