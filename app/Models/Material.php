<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_en", "name_ar", "address_en", "address_ar", "price", "image", "is_active", "user_id", "description_en", "description_ar",
        "rcategory_id", "type_id", "country_code", "available_amount"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rcategory()
    {
        return $this->belongsTo(Rcategory::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_code", "code");
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class, "reference");
    }
}
