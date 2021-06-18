<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use App\Models\AttributeGroup;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CreateProductForm extends Component
{
    use WithFileUploads;

    public $attr_group, $name, $article_num, $type, $description, $attr;
    public $combi = [];
    public $images = [];
    public $var_images = [];
    public $combinations_arr = [];


    protected $rules = [
        'name.0' => 'required|min:3',
        'name.*' => 'min:3',
        'article_num' => 'required',
        'description' => 'min:5',
        'images.*' => 'image|max:1024',
        'var_images.*.*'  => 'image|max:1024'
    ];

    protected $messages  = [
        'name.0.required' => 'Name field is required.',
        'name.*.min' => 'Name must be at least :min characters.',
        'var_images.*.*.image' => 'Uploaded file must be an image.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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
        $this->reset('combi');

        foreach ($this->attr_group as $item) { // get selected values
            if (isset($this->attr[strtolower($item->name)]))  $this->combinations_arr[strtolower($item->name)] = $this->attr[strtolower($item->name)];
        }

        $result = array();
        $cartasianArray = $this->cartasianArray($this->combinations_arr);

        $this->fill(['combi' => $cartasianArray]);
    }

    /**
     * Find all possible combinations of values from the input array and return in a logical order.
     *
     * @param  mixed $input
     * @return void
     */
    public function cartasianArray($input)
    {
        $result = array(array());

        foreach ($input as $key => $values) {
            if (!$values) {
                continue;
            }

            $append = array();
            //$i = 0;
            foreach ($result as $product) {
                // if($i == 0) dd($values);
                foreach ($values as $item) {
                    $product[$key] = $item;
                    $append[] = $product;
                }
                // $i++;
            }

            $result = $append;
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

       // dd($this->validate());
        $this->validate();

        $product = Product::create([
            'name' => $this->name[0],
            'article_number' => $this->article_num,
            'description' => $this->description,
        ]);

        $product->save();

        saveImage($this->images, $product->id);

        // Save combinations
        if ($this->type === "variable") {


            for ($i = 0; $i < count($this->combi); $i++) {
                $product_combination = ProductAttribute::create([
                    'product_id' => $product->id,
                    'article_number' => $this->article_num . "_" . $i,
                    'description' => $this->description
                ]);

                $product_combination->save();

                foreach ($this->combi[$i] as $key => $value) {

                    $attribute_id = DB::table('attributes')->where('name', $value)->pluck('id');

                    DB::table("product_attribute_combination")->insert([
                        'attribute_id' => $attribute_id->first(),
                        'product_attribute_id' =>  $product_combination->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }

                saveImage($this->var_images[$i], $product_combination->id, true);
            }
        }

        return redirect('/admin/products/' . $product->id);
    }

    public function render()
    {
        return view('livewire.create-product-form');
    }
}
