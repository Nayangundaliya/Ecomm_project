<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Contact\Database\factories\ContactFactory::new();
    }
}
