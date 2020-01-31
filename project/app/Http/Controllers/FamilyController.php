<?php

namespace App\Http\Controllers;

use App\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    //
	public function getOverview() {
		$families = Family::orderBy('created_at', 'desc')->get();
		return view('content.family.overview', ['families' => $families]);
	}
}
