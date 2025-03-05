<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';
    protected $fillable = ['judul', 'deskripsi', 'user_id', 'no_hp', 'jam_buka', 'kota', 'foto'];

    protected $casts = [
        'foto' => 'array', // Mengubah JSON ke array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
