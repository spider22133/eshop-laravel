<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_number',
    ];

    public function attributes(){
        return $this->belongsToMany(Attribute::class, 'product_attribute_combination');
    }

    public function images() {
        return $this->belongsToMany(Image::class, 'product_attribute_images');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

//    public function getOneImageArray() {
//       return $this->images()->select('src')->wherePivot('product_attribute_id', $this->id)->limit(1);;
//    }
}
