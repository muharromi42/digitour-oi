<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisatadata extends Model
{
    protected $table = 'wisatadata';

    protected $fillable = [
        'user_id',
        'nama_komersial',
        'tematik_dtw',
        'nama_perusahaan',
        'alamat',
        'nomor_telepon',
        'tahun_mulai_beroperasi',
        'total_luas_area',
        'luas_area_wisata',
        'jam_buka',
        'jam_tutup',
        'pengunjung_nusantara',
        'pengunjung_mancanegara',
        'tiket_nusantara',
        'tiket_mancanegara',
        'durasi_kunjungan',
        'dokumen_kapasitas',
        'kapasitas_pengunjung',
        'pendidikan_label',
        'jumlah_pendidikan',
        'gender_label',
        'jumlah_gender',
        'pendapatan',
        'pengeluaran',
        'museum_operasional',
        'aktivitas_alam',
        'wisata_alam',
        'wisata_buatan',
        'wisata_tirta',
        'hiburan_rekreasi',
        'metode_pemesanan',
        'persentase_online',
        'metode_pembayaran',
        'sarana_promosi',
        'paket_wisata',
        'luas_area_parkir',
        'kapasitas_motor',
        'kapasitas_mobil',
        'kapasitas_bus',
        'jumlah_toilet_umum',
        'pembagian_toilet',
        'toilet_khusus',
        'prosedur_sop',
        'sop_keamanan_pengunjung',
        'jalur_evakuasi',
        'asuransi_pengunjung',
        'pos_keamanan',
        'kamera_cctv',
        'foodservice',
        'signage',
        'pusat_informasi',
        'kotak_saran',
        'tempat_ibadah',
        'konsep_3r',
        'sistem_pengolahan_limbah',
        'sumberair'
    ];

    protected $casts = [
        'tematik_dtw' => 'array',
        'museum_operasional' => 'array',
        'aktivitas_alam' => 'array',
        'wisata_alam' => 'array',
        'wisata_buatan' => 'array',
        'wisata_tirta' => 'array',
        'hiburan_rekreasi' => 'array',
        'metode_pemesanan' => 'array',
        'metode_pembayaran' => 'array',
        'sarana_promosi' => 'array',
        'sumberair' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
