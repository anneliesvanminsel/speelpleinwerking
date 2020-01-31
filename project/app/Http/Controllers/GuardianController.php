<?php

namespace App\Http\Controllers;

use App\Family;
use App\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardianController extends Controller
{
    //
	public function getCreate($family_id) {
		$family = Family::findOrFail($family_id);

		return view('content.guardian.create', ['family' => $family]);
	}

	public function postCreate(Request $request, $family_id) {
		$family = Family::findOrFail($family_id);

		$this->validate($request, [
			'first_name' => 'required|string|max:255',
			'name'=> 'required|string|max:255',
			'phone_nr'=> 'required|string|max:255',
			'mailaddress'=> 'required|string|max:255',
			'role'=> 'required|string|max:255',
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$guardian = new Guardian;

		if(request()->image) {
			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/guardian/'), $imageName);

			$guardian->image = $imageName;
		}

		$guardian->name = $request->input('name');;
		$guardian->first_name = $request->input('first_name');;
		$guardian->phone_nr = $request->input('phone_nr');;
		$guardian->mailaddress = $request->input('mailaddress');;
		$guardian->role = $request->input('role');;
		$guardian->family_id = $family['id'];

		$guardian->save();
		$family->guardians()->save($guardian);

		return redirect()->route('account', ['user_id' => Auth::id()]);
	}
}
