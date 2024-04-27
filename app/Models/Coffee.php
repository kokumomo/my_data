<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actor;
use App\Models\Product;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'actor_id',
        'name',
        'information',
        'filename',
        'is_selling'
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
