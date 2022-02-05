<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

      protected $fillable = [
        'brant_en',
        'brant_hin',
        'brant_slug_en',
        'brant_slug_hin',
        'brant_image',
    ];
}
