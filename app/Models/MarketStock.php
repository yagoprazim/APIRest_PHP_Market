<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marketStock extends Model
{
    use HasFactory;
    protected $fillable = ['marketplace_id','product_id', 'unit_price', 'stock'];
}
