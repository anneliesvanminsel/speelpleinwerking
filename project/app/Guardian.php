<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    //
	protected $fillable = [
		'image', 'first_name', 'name', 'phone_nr', 'mailaddress', 'role', 'family_id',
	];

	public function family() {
		return $this->belongsTo('App\Family', 'family_id');
	}
}
