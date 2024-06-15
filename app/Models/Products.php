<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'products';

    public $primaryKey = 'id';
    public $incrementing = false;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'product_id', 'id');
    }
}
