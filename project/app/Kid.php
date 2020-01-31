<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
