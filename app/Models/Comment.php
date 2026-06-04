<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'name', 'body'];

    // Relasi balik ke Artikel
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}