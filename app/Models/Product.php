<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'article_number',
        'description'
    ];

    /**
     * Get all connected product attributes variations
     *
     * @return void
     */
    public function product_attributes() {
        return $this->hasMany(ProductAttribute::class);
    }

    /**
     * Get all connected images
     *
     * @return void
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    /**
     * Get all connected manufacturers
     *
     * @return void
     */
    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }
}
