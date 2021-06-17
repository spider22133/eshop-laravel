@foreach ($combiarray as $key => $attributes)

    <div class="flex">
        <label class="px-2 py-2 flex-0 self-center" for=""><strong>#{{ $loop->index }}</strong></label>
        @foreach ($attrGroup as $item)
            @if (isset($attributes[strtolower($item->name)]))
                <div class="px-2 py-2 flex-auto">

                    <select style="width: 100%"
                        id="combi.{{ $loop->parent->index }}.{{ strtolower($item->name) }}.0"
                        name="combi.{{ $loop->parent->index }}.{{ strtolower($item->name) }}.0"
                        wire:model="combi.{{ $loop->parent->index }}.{{ strtolower($item->name) }}.0">

                        @foreach ($item->attributes as $attr)
                            <option value="{{ $attr->name }}">{{ $attr->name }}</option>
                        @endforeach
                    </select>

                </div>

            @endif
        @endforeach
    </div>
@endforeach
