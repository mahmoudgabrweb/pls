<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    use HasFactory;

    protected $fillable = ["name_en", "name_ar", "address_en", "address_ar", "image", "rate", "phone", "email", "is_active"];
}
