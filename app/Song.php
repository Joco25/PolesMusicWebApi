<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name', 'album_id', 'track_number', 'genre_id', 'price', 'downloads'];
}
