<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_en", "name_ar", "address_en", "address_ar", "price", "image", "is_active", "user_id", "description_en", "description_ar",
        "rcategory_id", "type_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
