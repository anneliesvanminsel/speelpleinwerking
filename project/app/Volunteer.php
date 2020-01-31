<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    //

	public function address(){
		return $this->morphMany('App\Address', 'address');
	}
}
