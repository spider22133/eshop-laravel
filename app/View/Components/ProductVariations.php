<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductVariations extends Component
{
    public $attrGroup;
    public $combiarray;


    public function __construct($combiarray, $attrGroup)
    {
        $this->combiarray = $combiarray;
        $this->attrGroup = $attrGroup;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('backend.product.components.variations');
    }
}
