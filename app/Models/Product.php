<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'release_date',
        'product_type_id',
        'set_id',
    ];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }
}
