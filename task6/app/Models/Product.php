<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name_en','name_ar','price','quantity','status',
        'brand_id','subcategory_id','image',
        'details_ar','details_en'
    ];

    public function getImageAttribute($image)
    {
        return asset("images/products/" . $image);
    }
}
