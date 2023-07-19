<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderFactory::new();
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

   public function product()
    {
        return $this->belongsToMany(Product::class, "order_products")->withTimestamps();
    }
}
