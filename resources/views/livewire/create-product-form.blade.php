<form wire:submit.prevent="store" autocomplete="off" action = "/admin/products" method="post" enctype="multipart/form-data">
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
            <select name="type" class="form-select block w-full focus:bg-white" id="type" wire:model="type">
                <option value="Default">Default</option>
                <option value="Variable product">Variable product</option>
            </select>
            @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="attr_type">
                        Attribute type
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="attr_type" class="form-select block w-full focus:bg-white" id="attr_type" wire:model="attr_type">
                        @if ($attr_group->count())
                            @foreach ($attr_group as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('attr_type') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
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
            <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Save
            </button>
        </div>
    </div>
</form>
