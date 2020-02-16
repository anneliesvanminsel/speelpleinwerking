<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kid extends Model
{
    //
	protected $fillable = [
		'image', 'first_name', 'name', 'birthday', 'allergies', 'canSwim', 'hasTetanusShot', 'tetanus_date', 'medicins',
		'doc_name', 'doc_phone_nr', 'info', 'family_id',
	];

	public function family() {
		return $this->belongsTo('App\Family', 'family_id');
	}

	public function days(){
		return $this->belongsToMany('App\Day',
			'kid_day',
			'kid_id',
			'day_id')->withPivot('isPresent', 'hasPaid')->withTimestamps();
	}

	public function getAge(){
		$this->birthday->diff(Carbon::now())
			->format('%y years, %m months and %d days');
	}
}
