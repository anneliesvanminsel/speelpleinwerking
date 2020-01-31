<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
	protected $fillable = [
		'street', 'streetnumber', 'box', 'postalcode', 'city',
	];

	public function address() {
		return $this->morphTo();
	}
}
