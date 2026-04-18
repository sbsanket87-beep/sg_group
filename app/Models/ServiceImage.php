<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    // ✅ Allow mass assignment
    protected $fillable = [
        'service_id',
        'image',
    ];

    // ✅ Relationship: Image belongs to Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}