<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini untuk diisi data
    protected $fillable = [
        'title', 
        'slug', 
        'description', 
        'discussion_date', 
        'status', 
        'image_path'
    ];
}
