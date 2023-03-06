<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guard = ['id', 'created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
