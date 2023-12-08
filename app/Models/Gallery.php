<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $gurded = [];

    public function event()
    {
        return $this->belongsTo(GalleryEvent::class, 'event_id');
    }
}
