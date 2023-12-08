<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }

    public function subCategories(){
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }
}
