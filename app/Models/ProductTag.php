<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTag extends Pivot
{
    use HasFactory;
    protected $guard = ['id', 'created_at', 'updated_at'];
}
