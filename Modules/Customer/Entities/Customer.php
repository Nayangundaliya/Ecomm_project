<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $fillable = [
        "first_name",
        "last_name",
        "country",
        "city",
        "phone_no",
        "email",
        "password",
        "status"
    ];
    
    protected static function newFactory()
    {
        return \Modules\Customer\Database\factories\CustomerFactory::new();
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
