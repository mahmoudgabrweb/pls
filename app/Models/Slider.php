<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ["image", "the_order", "is_active", "title_en", "title_ar", "text_en", "text_ar"];
}
