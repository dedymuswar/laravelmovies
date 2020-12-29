<div>
    <div class="mt-8">
        <a href="{{ route('tv.show', $tvshow['id']) }}">
        <img src="{{ $tvshow['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-1"></a>
        <div class="mt-2">
            <a href="{{ route('tv.show', $tvshow['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $tvshow['name'] }}</a>
            <div class="flex items-center text-gray-400 mt-1">
                <span><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-orange-500" width="16" height="16" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
                <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $tvshow['first_air_date'] }}</span>
            </div>
            <div class="text-gray-400 text-sm">
                {{-- @foreach ($tvshow['genre_ids'] as $genre){{ $genres->get($genre) }} @if (!$loop->last), @endif
                @endforeach --}}
                {{-- setelah refactoring --}}
                {{ $tvshow['genres'] }}
            </div>
        </div>
    </div>
</div>