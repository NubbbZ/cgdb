<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'reference',
        'card_elements',
        'set_id'
    ];
    protected $casts = [
        'card_elements' => 'array',
    ];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }
}
