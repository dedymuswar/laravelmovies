<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRatingTv;
    public $genres;

    public function __construct($popularTv, $topRatingTv, $genres)
    {
        $this->popularTv = $popularTv;
        $this->topRatingTv = $topRatingTv;
        $this->genres = $genres;
    }

    /* Nama methods harus sama dengan variabel yang dilempar dari controller contohnya topRatingTv 
    tidak boleh TopRatingTv karena object tersebut akan langsung di parse ke view tanpa melalui view model*/
    public function popularTv()
    {
        return $this->formatTv($this->popularTv);
    }

    public function topRatingTv()
    {
        return $this->formatTv($this->topRatingTv);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    public function formatTv($tvshow)
    {
        return collect($tvshow)->map( function($tvshow){
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'vote_average' => $tvshow['vote_average'] * 10 .'%',
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'genre_ids','first_air_date', 'name', 'vote_average', 'overview', 'genres',
            ]);
        });
        // ->dump();
    }
}
