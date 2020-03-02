<?php

namespace App\Http\Controllers;

use App\Family;
use App\User;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    //
	public function getOverview() {
		$users = User::where('role', '=', 'fam')->get();
		return view('content.family.overview', ['users' => $users, 'oldSearch' => '']);
	}

	public function getDetail($fam_id) {
		$family = Family::findOrFail($fam_id);

		return view('content.family.detail', ['family' => $family]);
	}

	public function search(Request $request) {
		$search = $request->input('search');

		$users = User::where('email', 'like', '%' . $search . '%')->where('role', '=', 'fam')->get();

		return view('content.family.overview', ['users' => $users, 'oldSearch' => $search]);
	}
}
