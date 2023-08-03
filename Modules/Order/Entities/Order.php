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
        "first_name",
        "last_name",
        "dilevary_address_city",
        "dilevary_address_state",
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

   public function product()
    {
        return $this->belongsToMany(Product::class, "order_products")->withTimestamps();
    }
}
