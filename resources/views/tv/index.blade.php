@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        {{-- Start popular tv --}}
        <div class="popular-tv mb-16">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Show</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow"></x-tv-card>
                @endforeach
            </div>
        </div>
        {{-- End popular movies --}}
        {{-- Start now playing --}}
        <div class="now-playing">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rating Show</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topRatingTv as $tvshow)
                <x-tv-card :tvshow="$tvshow"></x-tv-card>
                @endforeach
            </div>
        </div>
        {{-- End now playing --}}
    </div>
@endsection