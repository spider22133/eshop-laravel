<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use phpDocumentor\Reflection\Types\This;
use Livewire\WithFileUploads;

class CreateProductForm extends Component
{
    use WithFileUploads;

    public $attr_group;
    public $name;
    public $article_num;
    public $description;
    public $images = [];

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

    public function render()
    {
        return view('livewire.create-product-form');
    }
}
