<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorpTraining extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trainings()
    {
        return $this->hasMany(CorpTraining::class, 'category_id');
    }
}
