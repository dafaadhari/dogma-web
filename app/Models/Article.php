<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'author_name',
        'title',
        'slug',
        'cover_image',
        'image_source',
        'content',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Nama penulis yang ditampilkan ke publik.
     * Pakai author_name jika diisi, jika tidak fallback ke nama akun pembuat.
     */
    public function getDisplayAuthorAttribute()
    {
        return $this->author_name ?: ($this->user->name ?? 'Redaksi DOGMA');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}