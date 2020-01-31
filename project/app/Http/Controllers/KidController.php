<?php

namespace App\Http\Controllers;

use App\Kid;
use Illuminate\Http\Request;

class KidController extends Controller
{
    //
	public function getOverview() {
		$kids = Kid::orderBy('name', 'desc')->get();
		return view('content.kid.overview', ['kids' => $kids]);
	}

}
