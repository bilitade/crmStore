<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
       "customer",
       "status",
       "store_id",
       "email",
       "Address",
       "totalPrice",
       "phone"

    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
