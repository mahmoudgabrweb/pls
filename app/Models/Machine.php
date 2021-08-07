<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_en", "name_ar", "address_en", "address_ar", "price", "image", "type", "is_active", "mcategory_id", "user_id", 
        "description_en", "description_ar", "country_code", "production_date", "machine_power"
    ];

    public function mcategory()
    {
        return $this->belongsTo(Mcategory::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, "country_code", "code");
    }
}
