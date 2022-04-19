<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image',
        'slug',
        'price',
        'status',
        'user_id',
        'store_id'
    ];

    // public function item(){
    //     return $this->belongsTo(Item::class);

    // }
    public function category(){
       return $this->belongsTo(Category::class);

       }

}
