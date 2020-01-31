<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
	protected $fillable = [
		'image', 'name', 'first_name', 'birthday', 'phone_nr', 'introtext', 'extrainfo', 'isVeggie',
		'hasAllergies', 'allergies', 'isActive', 'user_id', 'address_id',
	];

	public function address(){
		return $this->morphMany('App\Address', 'address');
	}
}
