<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    //
	public function getOverview() {
		$volunteers = Volunteer::orderBy('name', 'desc')->get();
		return view('content.volunteer.overview', ['volunteers' => $volunteers]);
	}
}
