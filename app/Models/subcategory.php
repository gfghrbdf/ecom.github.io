<?php

namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'sub_category_eng',
        'sub_category_hin',
        'sub_category_eng_slug',
        'sub_category_hin_slug',
    ];

    public function category(){

      return $this->belongsTo(Category::class,'category_id','id');
    }



}
