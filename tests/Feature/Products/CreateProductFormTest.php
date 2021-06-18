<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class CreateProductFormTest extends TestCase
{

    public function fields_are_required_for_saving_a_product()
    {
        Livewire::test('create-product-form')
        ->set('name', '')
        ->set('article_num', '')
        ->assertHasErrors([
            'name' => 'required',
            'article_num' => 'required',
        ]);
    }
}
