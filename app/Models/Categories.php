<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public $primaryKey = 'id';
    public $incrementing = false;

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMMM Y');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
