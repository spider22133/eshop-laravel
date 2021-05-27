<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'src' => 'array'
    ];


    public function product_attributes() {
        return $this->belongsToMany(ProductAttribute::class, 'product_attribute_images');
    }
}
