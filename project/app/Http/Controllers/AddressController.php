<?php

namespace App\Http\Controllers;

use App\Address;
use App\Family;
use App\Monitor;
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

	public function getCreateMoni($moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		return view('content.address.moni-create', ['monitor' => $monitor]);
	}

	public function postCreateMoni(Request $request, $moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		$this->validate($request, [
			'street' => 'required|string|max:255',
			'streetnumber'=> 'required|string|max:255',
			'postalcode'=> 'required|integer|min:1000|max:10000',
			'city'=> 'required|string|max:255',
			'box'=> 'nullable|string|max:255',
		]);

		$address = new Address;

		$address->street = $request->input('street');
		$address->streetnumber = $request->input('streetnumber');
		$address->box = $request->input('box');
		$address->postalcode = $request->input('postalcode');
		$address->city = $request->input('city');

		$address->address()->associate($monitor);
		$address->save();

		$monitor->address_id = $address['id'];
		$monitor->save();

		return redirect()->route('account', ['user_id' => $monitor['user_id']]);
	}

	public function getFamEdit($address_id) {
		$address = Address::findOrFail($address_id);

		return view('content.address.fam-edit', ['address' => $address]);
	}

	public function postFamEdit(Request $request, $address_id) {
		$address = Address::findOrFail($address_id);

		$this->validate($request, [
			'street' => 'required|string|max:255',
			'streetnumber'=> 'required|string|max:255',
			'postalcode'=> 'required|integer|min:1000|max:10000',
			'city'=> 'required|string|max:255',
			'box'=> 'nullable|string|max:255',
		]);

		$address->street = $request->input('street');
		$address->streetnumber = $request->input('streetnumber');
		$address->box = $request->input('box');
		$address->postalcode = $request->input('postalcode');
		$address->city = $request->input('city');

		$address->save();

		return redirect()->route('account', ['user_id' => Auth::id()]);
	}

	public function getMoniEdit($address_id) {
		$address = Address::findOrFail($address_id);

		return view('content.address.moni-edit', ['address' => $address]);
	}

	public function postMoniEdit(Request $request, $address_id) {
		$address = Address::findOrFail($address_id);

		$this->validate($request, [
			'street' => 'required|string|max:255',
			'streetnumber'=> 'required|string|max:255',
			'postalcode'=> 'required|integer|min:1000|max:10000',
			'city'=> 'required|string|max:255',
			'box'=> 'nullable|string|max:255',
		]);

		$address->street = $request->input('street');
		$address->streetnumber = $request->input('streetnumber');
		$address->box = $request->input('box');
		$address->postalcode = $request->input('postalcode');
		$address->city = $request->input('city');

		$address->save();

		return redirect()->route('account', ['user_id' => Auth::id()]);
	}
}
