<?php

namespace App\Models;

use App\CardElementType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardElement extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['name', 'slug', 'type'];
    protected $casts = [
        'type' => CardElementType::class,
    ];
}
