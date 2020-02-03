<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    //
	protected $fillable = [
		'image', 'name', 'first_name', 'birthday', 'extra_info', 'isVeggie', 'hasAllergies', 'allergies', 'phone_nr', 'user_id', 'address_id',
	];

	public function address(){
		return $this->morphMany('App\Address', 'address');
	}
}
