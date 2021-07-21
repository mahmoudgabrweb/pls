<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scategory extends Model
{
    use HasFactory;

    protected $fillable = ["name_en", "name_ar", "is_active", "parent_id"];

    public function parentCategory()
    {
        return $this->belongsTo(Scategory::class, "parent_id", "id");
    }
}
