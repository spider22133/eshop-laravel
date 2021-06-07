<form wire:submit.prevent="store" autocomplete="off" action = "/admin/products" method="post" enctype="multipart/form-data" x-data="{selectedOption:''}">
    @csrf
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="name">
                Name
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="form-input block w-full focus:bg-white" id="name" name="name" type="text" value="" wire:model="name">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="article_num">
                Article number
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="form-input block w-full focus:bg-white" id="article_num" name="article_num" type="text" value="" wire:model="article_num">
            @error('article_num') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="type">
                Type of product
            </label>
        </div>
        <div class="md:w-2/3">
            <select name="type" class="form-select block w-full focus:bg-white" id="type" wire:model="type" x-model="selectedOption">
                <option value="Default">Default</option>
                <option value="Variable product">Variable product</option>
            </select>
            @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="variable_product_container mb-6 animate-fade-in-down" x-show="selectedOption === 'Variable product'">
        <div id="combinations" class="variable_product_card border border-gray-400 rounded" x-data="{selected:null}">
            <div class="variable_product_card_header flex items-center justify-between px-4 py-3 border-b border-gray-200" x-on:click="selected !== 1 ? selected = 1 : selected = null">
                <h2 class="font-bold">Combinations</h2>
                <span :class="selected == 1 ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas"></span>
            </div>
            <div class="variable_product_card_content relative overflow-hidden transition-all max-h-0 duration-700 bg-gray-50"
            x-ref="container1"
            x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
            @if ($attr_group->count())
                <div class="md:flex pt-5 pr-10 pl-10 pb-10">
                    <div class="md:w-1/3">
                        <h2 class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" >
                            Choose attributes:
                        </h2>
                    </div>

                    <div class="md:w-2/3">
                            <div class="flex flex-row flex-wrap">
                                @foreach ($attr_group as $item)
                                    <div class="px-2 flex-1">
                                        <label class="text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                        for="attr.{{strtolower($item->name)}}">{{$item->name}}:</label>
                                            <select
                                            id="attr.{{strtolower($item->name)}}"
                                            name="attr.{{strtolower($item->name)}}"
                                            class="block w-full focus:bg-white"
                                            wire:model="attr.{{strtolower($item->name)}}"
                                            multiple>

                                                @foreach ($item->attributes as $attr )
                                                    <option value="{{$attr->name}}">{{$attr->name}}</option>
                                                @endforeach
                                            </select>
                                        @error("attr.{{strtolower($item->name)}}") <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                @endforeach
                            </div>
                                <button class="my-3 mx-2 px-4 py-2 text-sm font-medium
                                leading-5 text-white transition-colors duration-150
                                bg-purple-600 border border-transparent rounded-lg
                                active:bg-purple-600 hover:bg-purple-700 focus:outline-none
                                focus:shadow-outline-purple" wire:click="createCombinations">
                                Create combinations</button>
                        </div>

                    </div>
                @endif
                </div>
        </div>
    </div>

    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="description">
                Description
            </label>
        </div>
        <div class="md:w-2/3">
            <textarea class="form-textarea block w-full focus:bg-white" id="description" name="description" value="" rows="8" wire:model="description"></textarea>
            <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
        </div>
    </div>
    <div class="md:flex mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="images">
                Image
            </label>
        </div>
        <div class="md:w-2/3">
            <input class="form-input block w-full focus:bg-white" id="article_num" name="images" type="file" value="" wire:model="images" multiple>
            @error('images.*') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
            <button class="font-medium px-4 py-2
                                leading-5 text-white transition-colors duration-150
                                bg-purple-600 border border-transparent rounded-lg
                                active:bg-purple-600 hover:bg-purple-700 focus:outline-none
                                focus:shadow-outline-purple" type="submit">
                Save
            </button>
        </div>
    </div>
</form>
