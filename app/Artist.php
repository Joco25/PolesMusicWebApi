<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Artist extends Model
{

	protected $fillable = [
        'stage_name', 'description'
    ];

     public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function songs()
    {
    	return $this->hasMany('App\Song');
    }
}
