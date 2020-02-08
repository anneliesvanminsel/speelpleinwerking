<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactperson extends Model
{
    //
	protected $fillable = [
		'image', 'first_name', 'name', 'phone_nr', 'mailaddress', 'role', 'monitor_id',
	];

	public function monitor() {
		return $this->belongsTo('App\Monitor', 'monitor_id');
	}
}
