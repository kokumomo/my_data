<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actor;

class Snap extends Model
{
    use HasFactory;

    protected $fillable = [
        'actor_id',
        'filename'
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }
}
