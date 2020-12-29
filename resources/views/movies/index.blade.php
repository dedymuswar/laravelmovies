@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        {{-- Start popular movies --}}
        <div class="popular-movies mb-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie"></x-movie-card>
                @endforeach
            </div>
        </div>
        {{-- End popular movies --}}
        {{-- Start now playing --}}
        <div class="now-playing">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie"></x-movie-card>
                @endforeach
            </div>
        </div>
        {{-- End now playing --}}
    </div>
@endsection