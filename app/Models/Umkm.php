<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;


    protected $table = 'umkm';
    protected $fillable = [
        'judul',
        'deskripsi',
        'user_id',
        'waktu_kunjungan',
        'no_hp',
        'alamat',
        'map',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
