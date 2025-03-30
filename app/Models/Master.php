<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Master extends Model
{
    protected $fillable = [
        'first_name',  // Добавлено явно
        'last_name',
        'second_name',
        'email',
        'phone'
    ];

    public function getFullNameAttribute()
    {
        return trim("{$this->last_name} {$this->first_name} {$this->second_name}");
    }
    use HasFactory;
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
