<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use phpDocumentor\Reflection\Types\This;
use Livewire\WithFileUploads;
use App\Models\Attribute;

class CreateProductForm extends Component
{
    use WithFileUploads;

    public $attr_group;
    public $name;
    public $article_num;
    public $type;
    public $description;
    public $attr_type = [];
    public $images = [];


    /**
     * Store new product in database.
     *
     * @return void
     */
    public function store() {
        $this->validate([
            'name' => 'required|min:3',
            'article_num' => 'required',
            'description' => 'min:5',
            'images.*' => 'image|max:1024'
        ]);

        $product = new Product([
            'name' => $this->name,
            'article_number' => $this->article_num,
            'description' => $this->description,
        ]);

        $product->save();


        saveImage($this->images, $product->id);


        return redirect('/admin/products/' . $product->id);
    }

    public function toggleAttr($value)
    {
       $this->emit('toggleAttr', $this->attr_type);
    }

    public function getAttrValues() {
        return Attribute::where('id_attribute_group', $this->attr_type)->get();
    }

    public function render()
    {
        return view('livewire.create-product-form');
    }
}
