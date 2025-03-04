<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'tanggal',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
