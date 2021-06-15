<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use phpDocumentor\Reflection\Types\This;
use Livewire\WithFileUploads;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\View\Components\ProductVariations;

class CreateProductForm extends Component
{
    use WithFileUploads;

    public $attr_group, $name, $article_num, $type, $description, $attr;
    public $combi = [];
    public $images = [];
    public $combinations_arr = [];


    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->attr_group = AttributeGroup::all();
    }

    /**
     * create product combinations
     *
     * @return void
     */
    public function createCombinations()
    {
        $this->combinations_arr = []; // clear selected values

        foreach ($this->attr_group as $item) { // get selected values
            if (isset($this->attr[strtolower($item->name)]))  $this->combinations_arr[strtolower($item->name)] = $this->attr[strtolower($item->name)];
        }
        $arr = array();
        $result = $this->cartasianArray($this->combinations_arr);
        foreach ($result as $key => $value) {
            foreach ($this->attr_group as $key2 => $item) {
                if (isset($this->attr[strtolower($item->name)])){
                    $arr[$key][strtolower($item->name)] = [$value[$key2]];
                }
            }
        }

       $this->fill(['combi' => $arr]);
    }

    /**
     * Find all possible combinations of values from the input array and return in a logical order.
     *
     * @param  mixed $input
     * @return void
     */
    public function cartasianArray($input)
    {

        if (!$input) {
            return array(array());
        }

        $subset = array_shift($input);
        $cartesianSubset = $this->cartasianArray($input);
        $result = array();

        foreach ($subset as $value) {
            foreach ($cartesianSubset as $p) {
                array_unshift($p, $value);
                $result[] = $p;
            }
        }

        return $result;
    }


    /**
     * Store new product in database.
     *
     * @return void
     */
    public function store()
    {
        // Save combinations
        if ($this->type === "variable") {
            dd($this->combi);
        }

        dd('Simple');
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
