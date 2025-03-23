<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penginapan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('waktu_kunjungan');
            $table->string('no_hp');
            $table->text('alamat');
            $table->text('map')->nullable();
            $table->json('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penginapans');
    }
};
