@foreach ($combiarray as $key => $attributes)

    <div class="flex items-center pr-10 pl-10">
        <label class="px-2 py-2 flex-0 self-center" for=""><strong>#{{ $loop->index }}</strong></label>
        @foreach ($attrGroup as $item)
            @if (isset($attributes[strtolower($item->name)]))
                <div class="px-2 py-2 flex-auto">

                    <select class="dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200"
                        style="width: 100%"
                        id="combi.{{ $loop->parent->index }}.{{ strtolower($item->name) }}"
                        name="combi.{{ $loop->parent->index }}.{{ strtolower($item->name) }}"
                        wire:model="combi.{{ $loop->parent->index }}.{{ strtolower($item->name) }}">

                        @foreach ($item->attributes as $attr)
                            <option value="{{ $attr->name }}">{{ $attr->name }}</option>
                        @endforeach
                    </select>

                </div>

            @endif
        @endforeach
        <div class="p-2 border rounded bg-white"
            x-on:click="selected_combi !== {{ $key }} ? selected_combi = {{ $key }} : selected_combi = null">
            <span :class="selected_combi == {{ $key }} ? 'fa-chevron-up' : 'fa-chevron-down'"
                class="fas"></span>
        </div>

    </div>
    <div class="relative items-center bg-white overflow-hidden transition-all max-h-0 duration-700"
        x-ref="attr{{ $key }}"
        :style="selected_combi == {{ $key }} ? 'max-height: ' + $refs.attr{{ $key }}.scrollHeight + 'px' : ''">
        <div class="text-gray-700 px-12 py-4 space-y-3">
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                        for="name.{{ $key }}">
                        Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" type="text" value=""
                        wire:model="name.{{ $key + 1 }}">
                    @error('name.' . ($key + 1)) <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="var_images">
                        Image
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input class="form-input block w-full focus:bg-white" type="file" value=""
                        wire:model="var_images.{{ $key }}" multiple>
                    @error('var_images.' . $key .'.*') <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endforeach
