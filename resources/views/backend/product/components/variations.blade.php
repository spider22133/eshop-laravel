@foreach ($combiarray as $key => $attributes)

    <div class="flex items-center pr-10 pl-10">
        <label class="px-2 py-2 flex-0 self-center" for=""><strong>#{{ $loop->index }}</strong></label>
        @foreach ($attrGroup as $item)
            @if (isset($attributes[strtolower($item->name)]))
                <div class="px-2 py-2 flex-auto">

                    <select style="width: 100%"
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
            x-on:click="selected_combi !== {{$key}} ? selected_combi = {{$key}} : selected_combi = null">
            <span :class="selected_combi == {{$key}} ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas"></span>
        </div>

    </div>
    <div class="flex items-center bg-white overflow-hidden transition-all max-h-0 duration-700" x-ref="attr{{$key}}"
        :style="selected_combi == {{$key}} ? 'max-height: ' + $refs.attr{{$key}}.scrollHeight + 'px' : ''">
        <div class="py-12 px-12">Test</div>
    </div>
@endforeach
