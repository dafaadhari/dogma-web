<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'discussion_date',
        'location',
        'status',
        'image_path'
    ];

    protected $casts = [
        'discussion_date' => 'datetime',
    ];

    /**
     * Status efektif: otomatis 'completed' jika tanggal diskusi sudah lewat,
     * walaupun nilai di database masih 'upcoming'.
     */
    public function getStatusAttribute($value)
    {
        if ($this->discussion_date && $this->discussion_date->isPast()) {
            return 'completed';
        }

        return $value;
    }
}
