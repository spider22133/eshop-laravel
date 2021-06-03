<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAttrValues extends Component
{
    public $show_attr = 0;

    protected $listeners = ['toggleAttr'];

    public function toggleAttr($attr_type) {
        $this->show_attr = 1;
    }

    public function render()
    {
        return view('livewire.show-attr-values');
    }
}
