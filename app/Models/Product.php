<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Product_Image;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_role_id',
        'title',
        'description',
        'price',
        'quantity',
        'low_inventory',
        'is_featured',
        'is_free_shipping',
        'shipping_charges',
        'category_id',
        'is_comment_allowed',
        'is_rating_allowed',
        'weight',
        
    ];

    // public function product_image() {
    //     return $this->hasMany(Product_Image::class);
    // }
}
