<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'users';

    public $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'avatar',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMMM Y');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'date',
            'password' => 'hashed',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'customer_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Carts::class, 'customer_id', 'id');
    }
}
