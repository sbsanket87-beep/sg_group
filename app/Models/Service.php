<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // ✅ Allow mass assignment
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    // ✅ Relationship: One Service → Many Images
    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }
}