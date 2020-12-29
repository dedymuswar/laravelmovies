@extends('layouts.main')
@section('content')
<div class="tv-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ $tvshow['poster_path'] }}" alt="parasite" class="w-64 md:w-96">
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $tvshow['name'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 mt-1">
                <span><svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-orange-500" width="16"
                        height="16" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg></span>
                <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $tvshow['first_air_date'] }}</span>
                <span class="mx-2">|</span>
                <span>
                    {{-- @foreach ($tvshow['genres'] as $genre)
                    {{ $genre['name'] }} @if (!$loop->last)
                    ,
                    @endif
                    @endforeach --}}
                    {{-- Setelah refactoring di tvshowViewModel --}}
                    {{ $tvshow['genres'] }}
                </span>
            </div>
            <p class="text-gray-300 mt-8">
                {{ $tvshow['overview'] }}
            </p>

            <div class="mt-12">
                {{-- <h4 class="text-white font-semibold">Featured Cast</h4> --}}
                <div class="flex mt-4">
                    @foreach ($tvshow['created_by'] as $crew)
                    <div class="mr-8">
                        <div>{{ $crew['name'] }}</div>
                        <div class="text-sm text-gray-400">Creator</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div x-data="{isOpen:false}">
                @if (count($tvshow['videos']['results']) > 0)
                <div class="mt-12">
                    <button @click="isOpen = true"
                        class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-play-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                        <div class="ml-2">Play Trailer</div>
                    </button>
                </div>
                @endif

                {{-- Modal tv start --}}
                <div style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    x-show.transition.opacity="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button class="text-3xl leading-none hover:text-gray-300"
                                    @click="isOpen = false">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%">
                                    <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                        src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}"
                                        style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End tv info  --}}


{{-- Tv Cast --}}
<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($tvshow['cast'] as $cast)
            {{-- @if ($loop->index < 5)  //sudah di take(5) di movieViewModel--}}
            <div class="mt-8">
                <a href="{{ route('actors.show', $cast['id']) }}">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$cast['profile_path'] }}" alt="parasite"
                        class="hover:opacity-75 transition ease-in-out duration-1"></a>
                <div class="mt-2">
                    <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                    <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- End of tv cast --}}

{{-- Images tvshow--}}
<div class="movie-cast border-b border-gray-800" x-data="{ isOpen : false, image:''} ">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tvshow['images'] as $image)
            {{-- @if ($loop->index < 9)  //sudah di take(9) di movieViewModel --}}
            <div class="mt-8">
                <a @click.prevent="isOpen = true 
                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                " href="http://">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="parasite"
                        class="hover:opacity-75 transition ease-in-out duration-1"></a>
            </div>
            @endforeach
        </div>
    </div>
    {{-- Modal video start --}}
    <div style="background-color: rgba(0, 0, 0, .5);"
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
        x-show.transition.opacity="isOpen">
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
            <div class="bg-gray-900 rounded">
                <div class="flex justify-end pr-4 pt-2">
                    <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                        class="text-3xl leading-none hover:text-gray-300">&times;
                    </button>
                </div>
                <div class="modal-body px-8 py-8">
                    <img :src="image" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of images tvshow --}}
</div>
@endsection