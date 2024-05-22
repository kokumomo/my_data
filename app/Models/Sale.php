<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'filename'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
