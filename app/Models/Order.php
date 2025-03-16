<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function masters(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
    public function works(): BelongsToMany
    {
        return $this->belongsToMany(Work::class, 'orders_works')
            ->withPivot(['cost', 'quantity']);
    }
}
