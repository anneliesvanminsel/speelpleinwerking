<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //
	protected $fillable = [
		'date', 'week_id',
	];

	public function week() {
		return $this->belongsTo('App\Week', 'week_id');
	}

	public function kids(){
		return $this->belongsToMany('App\Kid',
			'kid_day',
			'day_id',
			'kid_id')->withPivot('isPresent', 'hasPaid')->withTimestamps();
	}
}
