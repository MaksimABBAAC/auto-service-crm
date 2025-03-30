<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Work extends Model
{
    protected $fillable = ['name', 'cost'];

    public function orders()
    {

        return $this->belongsToMany(Order::class, 'orders_works')
            ->withPivot(['quantity', 'cost']);
    }
}
