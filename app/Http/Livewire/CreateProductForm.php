<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use phpDocumentor\Reflection\Types\This;
use Livewire\WithFileUploads;
use App\Models\Attribute;
use App\Models\AttributeGroup;

class CreateProductForm extends Component
{
    use WithFileUploads;

    public $attr_group, $name, $article_num, $type, $description, $attr;
    public $attr_types = [];
    public $images = [];



    /**
     * mount
     *
     * @return void
     */
    public function mount() {
        $this->attr_group = AttributeGroup::all();
        foreach($this->attr_group as $group) {
            array_push($this->attr_types, strtolower($group->name));
        }
    }

    /**
     * create product combinations
     *
     * @return void
     */
    public function createCombinations() {
        $comb_arr = [];
        foreach($this->attr_types as $key) {
            $comb_arr[] = $this->attr[$key];
        }
        dd($comb_arr);
    }


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

    public function render()
    {
        return view('livewire.create-product-form');
    }
}
