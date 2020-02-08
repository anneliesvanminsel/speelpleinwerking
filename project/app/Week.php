<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //
	protected $fillable = [
		'startdate', 'enddate', 'maxVolunteers',
	];

	public function monitors(){
		return $this->belongsToMany('App\Monitor',
			'monitor_week',
			'monitor_id',
			'week_id')->withPivot('wantsIntern')->withTimestamps();
	}

	public function days(){
		return $this->hasMany('App\Day');
	}
}
