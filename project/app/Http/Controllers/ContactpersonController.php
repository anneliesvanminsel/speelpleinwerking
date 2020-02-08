<?php

namespace App\Http\Controllers;

use App\Contactperson;
use App\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactpersonController extends Controller
{
    //
	public function getCreate($moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		return view('content.contactperson.create', ['monitor' => $monitor]);
	}

	public function postCreate(Request $request, $moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		$this->validate($request, [
			'first_name' => 'required|string|max:255',
			'name'=> 'required|string|max:255',
			'phone_nr'=> 'required|string|max:255',
			'mailaddress'=> 'required|string|max:255',
			'role'=> 'required|string|max:255',
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$contact = new Contactperson;

		if(request()->image) {
			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/guardian/'), $imageName);

			$contact->image = $imageName;
		}

		$contact->name = $request->input('name');;
		$contact->first_name = $request->input('first_name');;
		$contact->phone_nr = $request->input('phone_nr');;
		$contact->mailaddress = $request->input('mailaddress');;
		$contact->role = $request->input('role');;
		$contact->monitor_id = $monitor['id'];

		$contact->save();
		$monitor->contacts()->save($contact);

		return redirect()->route('account', ['user_id' => Auth::id()]);
	}
}
