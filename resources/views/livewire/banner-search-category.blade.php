<div>
    <input 
    type="text" {{-- name="category" --}}
    class="block mt-1 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white caret-red-500 focus:border-red-600 focus:ring-offset-2 focus:ring focus:ring-red-300 focus:shadow-red-500 focus:outline-none"
    placeholder="Agregar Categoría" 
    wire:model="query" 
    wire:keydown.escape="resete" 
    wire:keydown.tab="resete"
    wire:keydown.arrow-up="decrementHighlight" 
    wire:keydown.arrow-down="incrementHighlight"
        {{-- wire:keydown.enter="selectCategory"  --}}
        />

    <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        <div class="list-item">Buscando...</div>
    </div>


    @if (!empty($query))
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resete"></div>

        <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            @if (!empty($categorys))
            {{$categorys}}
                @foreach ($categorys as $i => $category)
                    {{-- <a href="{{ route('show-contact', $category['id']) }}"
                        class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}">{{ $category['name'] }}</a> --}}
                    {{-- <p class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}">{{ $category['category'] }}</p> --}}
                    <p class="list-item">{{ $category['category'] }}</p>
                @endforeach
            @else
                <div class="list-item">No hay resultados!</div>
            @endif
        </div>
    @endif
</div>
