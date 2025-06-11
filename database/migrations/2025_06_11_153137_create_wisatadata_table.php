<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wisatadata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komersial');
            $table->json('tematik_dtw')->nullable();
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->year('tahun_mulai_beroperasi');
            $table->string('total_luas_area')->nullable();
            $table->string('luas_area_wisata')->nullable();
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->integer('pengunjung_nusantara')->nullable();
            $table->integer('pengunjung_mancanegara')->nullable();
            $table->integer('tiket_nusantara')->nullable();
            $table->integer('tiket_mancanegara')->nullable();
            $table->string('durasi_kunjungan')->nullable();
            $table->string('dokumen_kapasitas')->nullable();
            $table->integer('kapasitas_pengunjung')->nullable();
            $table->string('pendidikan_label')->nullable();
            $table->integer('jumlah_pendidikan')->nullable();
            $table->string('gender_label')->nullable();
            $table->integer('jumlah_gender')->nullable();
            $table->bigInteger('pendapatan')->nullable();
            $table->bigInteger('pengeluaran')->nullable();
            $table->json('museum_operasional')->nullable();
            $table->json('aktivitas_alam')->nullable();
            $table->json('wisata_alam')->nullable();
            $table->json('wisata_buatan')->nullable();
            $table->json('wisata_tirta')->nullable();
            $table->json('hiburan_rekreasi')->nullable();
            $table->json('metode_pemesanan')->nullable();
            $table->integer('persentase_online')->nullable();
            $table->json('metode_pembayaran')->nullable();
            $table->json('sarana_promosi')->nullable();
            $table->enum('paket_wisata', ['Ada', 'Tidak Ada'])->nullable();
            $table->string('luas_area_parkir')->nullable();
            $table->integer('kapasitas_motor')->nullable();
            $table->integer('kapasitas_mobil')->nullable();
            $table->integer('kapasitas_bus')->nullable();
            // Fasilitas Toilet
            $table->integer('jumlah_toilet_umum')->nullable();
            $table->enum('pembagian_toilet', ['Ada', 'Tidak Ada'])->default('Ada');
            $table->enum('toilet_khusus', ['Ada', 'Tidak Ada'])->default('Ada');

            // Keamanan
            $table->enum('prosedur_sop', ['Ada', 'Tidak Ada'])->default('Ada');
            $table->enum('sop_keamanan_pengunjung', ['Ada', 'Tidak Ada'])->default('Ada');
            $table->enum('jalur_evakuasi', ['Ada', 'Tidak Ada'])->default('Ada');
            $table->enum('asuransi_pengunjung', ['Ada', 'Tidak Ada'])->default('Ada');
            $table->enum('pos_keamanan', ['Ada', 'Tidak Ada'])->default('Ada');
            $table->enum('kamera_cctv', ['Ada', 'Tidak Ada'])->default('Ada');

            $table->string('foodservice')->nullable();

            $table->string('signage')->nullable();
            $table->string('pusat_informasi')->nullable();
            $table->string('kotak_saran')->nullable();
            $table->string('tempat_ibadah')->nullable();
            $table->string('konsep_3r')->nullable();
            $table->string('sistem_pengolahan_limbah')->nullable();

            $table->json('sumberair')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatadata');
    }
};
