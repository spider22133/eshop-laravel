<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public function group() {
        return $this->belongsTo(AttributeGroup::class,'id_attribute_group');
    }

    public function product_attributes() {
        return $this->belongsToMany(ProductAttribute::class,'product_attribute_combination');
    }

}
