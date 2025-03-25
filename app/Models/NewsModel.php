<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsModel extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'deskripsi',
        'tanggal',
        'foto',
    ];

    // Automatically generate slug when creating or updating the model
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->judul, '-') . '-' . Str::random(5);
        });

        static::updating(function ($news) {
            if ($news->isDirty('judul')) {
                $news->slug = Str::slug($news->judul, '-') . '-' . Str::random(5);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
