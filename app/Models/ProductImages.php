<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'uuid', 'name', 'path'];
    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
