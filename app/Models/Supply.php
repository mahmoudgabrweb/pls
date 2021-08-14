<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_en", "name_ar", "address_en", "address_ar", "price", "image", "type", "is_active", "scategory_id", "user_id",
        "description_en", "description_ar", "country_code", "production_date", "machine_power"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scategory()
    {
        return $this->belongsTo(Scategory::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_code", "code");
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class, "reference");
    }
}
