<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'seller_id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with User (Seller)
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Define relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
