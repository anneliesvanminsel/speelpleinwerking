<?php

namespace App\Http\Controllers;

use App\Playgroup;
use Illuminate\Http\Request;

class PlaygroupController extends Controller
{
    //
	public function getOverview() {
		$playgroups = Playgroup::orderBy('created_at', 'desc')->get();
		return view('content.playgroup.overview', ['playgroups' => $playgroups]);
	}

	public function getCreate() {
		return view('content.playgroup.create');
	}

	public function postCreate(Request $request) {

		return redirect()->route('playgroup.overview');
	}
}
