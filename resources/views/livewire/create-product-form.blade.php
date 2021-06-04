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
        <div id="combinations" class="variable_product_card border border-gray-400" x-data="{selected:null}">
            <div class="variable_product_card_header flex items-center justify-between px-4 py-3 border-b border-gray-200"
            @click="selected !== 1 ? selected = 1 : selected = null">
                <h2 class="font-bold">Combinations</h2>
                <span :class="selected == 1 ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas"></span>
            </div>
            <div class="variable_product_card_content relative overflow-hidden transition-all max-h-0 duration-700 bg-gray-50"
            x-ref="container1"
            x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                <div class="md:flex pt-5 pr-10 pl-10 pb-10">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="attr_type">
                            Attributes
                        </label>
                    </div
                    <div class="md:w-2/3">
                        {{-- <select
                        id="attr_type"
                        name="attr_type"
                        class="form-select block w-full focus:bg-white"
                        wire:model="attr_type"
                        multiple>
                            @if ($attr_group->count())
                                @foreach ($attr_group as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('attr_type') <span class="text-red-500">{{ $message }}</span> @enderror --}}
                    </div>
                </div>
                @if(!empty($attr_type))
                    @livewire('show-attr-values')
                @endif


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
            <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Save
            </button>
        </div>
    </div>
</form>
