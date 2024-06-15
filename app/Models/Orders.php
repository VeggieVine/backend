<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'orders';

    public $primaryKey = 'id';
    public $incrementing = false;

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
