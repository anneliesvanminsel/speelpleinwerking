<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playgroup extends Model
{
    //
	protected $fillable = [
		'name', 'image', 'description', 'minAge', 'maxAge',
	];
}

