<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function getTotalAttribute()
    {
        return $this->quantity * $this->product->price;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
