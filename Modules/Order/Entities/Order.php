<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id ",
        "product_id ",
        "first_name",
        "last_name",
        "phone_no",
        "dilivary_address",
        "pincode",
        "total_prise",
        "total_quantaty",
        "payment_mode",
        "order_status",
        "payment_status",
        
    ];
    
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderFactory::new();
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    protected $with = ['products'];
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
