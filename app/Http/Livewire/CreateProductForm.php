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
    public $images = [];
    public $comb_arr = [];


    /**
     * mount
     *
     * @return void
     */
    public function mount() {
        $this->attr_group = AttributeGroup::all();
    }

    /**
     * create product combinations
     *
     * @return void
     */
    public function createCombinations() {

        $this->validate([
            'attr.*' => 'required'
        ]);



        $this->comb_arr = []; // clear selected values

        foreach($this->attr_group as $item) { // get selected values
            if(isset($this->attr[strtolower($item->name)]))  $this->comb_arr[strtolower($item->name)] = $this->attr[strtolower($item->name)];
        }

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

        // Save combinations
        if ($this->type === "variable") {
            dd('Variable');
        } else {
            dd('Simple');
        }

        saveImage($this->images, $product->id);

        return redirect('/admin/products/' . $product->id);
    }

    public function render()
    {
        return view('livewire.create-product-form');
    }
}
