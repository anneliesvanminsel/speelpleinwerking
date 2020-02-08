<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    //
	protected $fillable = [
		'image', 'name', 'first_name', 'birthday', 'extra_info', 'isVeggie', 'allergies', 'phone_nr', 'user_id', 'address_id',
	];

	public function address(){
		return $this->morphMany('App\Address', 'address');
	}

	public function users(){
		return $this->morphMany('App\User', 'account');
	}

	public function weeks(){
		return $this->belongsToMany('App\Week',
			'monitor_week',
			'monitor_id',
			'week_id')->withPivot('wantsIntern')->withTimestamps();
	}

	public function contacts(){
		return $this->hasMany('App\Contactperson');
	}
}
