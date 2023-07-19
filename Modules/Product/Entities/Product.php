<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product_Image;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'replacement_days',
        'warranty_year',
        'selling_price',
        'quantity',
        'trending',
        'status',
    ];
    // protected $with = ['category'];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // protected $with = ['images'];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, "order_products")->withTimestamps();
    }
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }
}
