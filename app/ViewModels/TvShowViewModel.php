<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;

    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }

    /* Nama methods harus sama dengan variabel yang dilempar dari controller contohnya topRatingTv 
    tidak boleh TopRatingTv karena object tersebut akan langsung di parse ke view tanpa melalui view model*/

    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->tvshow['poster_path'],
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'vote_average' => $this->tvshow['vote_average'] * 10 . '%',
            'genres'    => collect($this->tvshow['genres'])->pluck('name')->implode(', '),
            'crew'  =>  collect($this->tvshow['credits']['crew'])->take(2),
            'cast'  => collect($this->tvshow['credits']['cast'])->take(5),
            'images'  => collect($this->tvshow['images']['backdrops'])->take(9),
        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview', 'first_air_date', 'credits', 'videos', 'images', 'crew', 'cast', 'created_by'
        ])->dump();
    }
}
