<?php

namespace App\Http\Controllers;

use App\Address;
use App\Family;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    //
	public function getCreateFamily() {
		return view('content.address.fam-create');
	}

	public function postCreateFamily(Request $request) {
		$user = User::findOrFail(Auth::id());

		$this->validate($request, [
			'street' => 'required|string|max:255',
			'streetnumber'=> 'required|string|max:255',
			'postalcode'=> 'required|integer|min:1000|max:10000',
			'city'=> 'required|string|max:255',
			'box'=> 'nullable|string|max:255',
		]);

		$family = new Family;
		$family->save();

		$user->account()->associate($family);
		$user->save();

		$address = new Address;

		$address->street = $request->input('street');
		$address->streetnumber = $request->input('streetnumber');
		$address->box = $request->input('box');
		$address->postalcode = $request->input('postalcode');
		$address->city = $request->input('city');

		$address->address()->associate($family);
		$address->save();

		$family->user_id = $user['id'];
		$family->address_id = $address['id'];
		$family->save();

		return redirect()->route('account', ['user_id' => $user['id']]);
	}
}
