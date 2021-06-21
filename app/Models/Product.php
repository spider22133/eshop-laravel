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

    public function product_attributes() {
        return $this->hasMany(ProductAttribute::class);
    }

    public function colored_product_attributes() {

    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }
}
