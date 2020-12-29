<div class="relative" x-data="{isOpen: true}" @click.away="isOpen=false">
    <input type="text"
        x-ref="search"
        wire:model.debounce.500ms="search"
        class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-8 focus:outline-none focus:shadow-outline" 
        placeholder="search (Press '/' to focus)"
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.window="
            if(event.keyCode == 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen=false"
    >

    <div class="absolute top-0">
        <svg class="text-gray-700 mt-2 ml-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
    </div>
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>
    @if (strlen($search) >= 2)
    <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4 text-sm" 
    x-show.transition.opacity="isOpen"
    >
        @if ($searchResults->count() > 0)
        <ul>
            @foreach ($searchResults as $result)
            <li class="border-b border-gray-700 block">
                <a 
                    href="{{ route('movies.show', $result['id']) }}" class="hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out 
                    duration-150"
                    @if ($loop->last) @keydown.tab="isOpen = false" @endif
                >
                    @if ($result['poster_path'])
                    <img src="{{ 'https://image.tmdb.org/t/p/w92/'.$result['poster_path'] }}" alt="poster" class="w-8">
                    @else 
                    <img src="{{ 'https://via.placeholder.com/50x75' }}" class="w-8" alt="poster" srcset="">
                    @endif
                    <span class="ml-4">{{ $result['title'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else 
        <div class="px-3 py-3">No results for "{{ $search }}"</div>
        @endif
    </div>
    @endif
    
</div>