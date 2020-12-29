@extends('layouts.main')
@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{ $actor['profile_path'] }}" alt="parasite" class="w-64 md:w-96">
            {{-- Start social media --}}
            <ul class="flex items-center mt-4">
                @if ($social['facebook'])
                <li class=""><a href="{{ $social['facebook'] }}" title="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-facebook">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg></a>
                </li>
                @endif
                @if ($social['instagram'])
                <li class="mx-6"><a href="{{ $social['instagram'] }}" title="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-instagram">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg></a>
                </li>
                @endif
                @if ($social['twitter'])
                <li class="mr-6"><a href="{{ $social['twitter'] }}" title="Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="28"
                            height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                            <path
                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                            </path>
                        </svg>
                    </a>
                </li>
                @endif
                @if ($actor['homepage'])
                <li><a href="{{ $actor['homepage'] }}" title="website"><svg xmlns="http://www.w3.org/2000/svg"
                            width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-globe">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path
                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                            </path>
                        </svg>
                    </a>
                </li>
                @endif
            </ul>
            {{-- end social media --}}
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 mt-1">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-gift">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg></span>
                <span class="ml-1">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in
                    {{ $actor['place_of_birth'] }}</span>
            </div>
            <p class="text-gray-300 mt-8">
                {{ $actor['biography'] }}
            </p>

            <h4 class="font-semibold mt-12">Known For</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                @foreach ($knownForTitles as $knownFor)
                <div class="mt-4">
                    <a href="{{ $knownFor['link_to_page'] }}"><img
                            src="{{ $knownFor['poster_path'] }}"
                            alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                        <a href="{{ $knownFor['link_to_page'] }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">The
                            {{ $knownFor['title'] }}</a>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{--End actor info  --}}

{{-- Credits --}}
<div class="credits border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Credits</h2>
        <ul class="list-disc leading-loose pl-5 mt-8">
            @foreach ($credits as $credit)
            <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
{{-- end of Credits --}}
@endsection