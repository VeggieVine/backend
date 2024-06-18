<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'order_items';

    public $primaryKey = 'id';
    public $incrementing = false;

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMMM Y');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
