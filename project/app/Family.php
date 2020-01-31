<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    //
	protected $fillable = [
		'user_id', 'address_id',
	];

	public function address(){
		return $this->morphMany('App\Address', 'address');
	}

	public function kids(){
		return $this->hasMany('App\Kid');
	}

	public function guardians(){
		return $this->hasMany('App\Guardian');
	}

	public function users(){
		return $this->morphMany('App\User', 'account');
	}
}
