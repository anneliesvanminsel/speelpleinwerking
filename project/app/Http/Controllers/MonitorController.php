<?php

namespace App\Http\Controllers;

use App\Monitor;
use App\User;
use App\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    //
	public function getOverview() {
		$monitoren = Monitor::orderBy('name', 'desc')->get();
		return view('content.monitor.overview', ['monitoren' => $monitoren, 'oldSearch' => '']);
	}

	public function getCreate($user_id) {
		$user = User::findOrFail($user_id);

		return view('content.monitor.create', ['user' => $user]);
	}

	public function postCreate(Request $request, $user_id) {
		$user = User::findOrFail($user_id);

		$dt = new Carbon();
		$before = $dt->subYears(16)->format('Y-m-d');

		$this->validate($request, [
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
			'name' => 'required|string|max:255',
			'first_name' => 'required|string|max:255',
			'birthday' => 'required|date|before:' . $before,
			'extra_info' => 'nullable|string|max:255',
			'phone_nr'=> 'required|string|max:255',
			'isVeggie' => 'nullable|string|max:255',
			'allergies' => 'nullable|string|max:255',
		]);

		$boolVeggie = $request->input('isVeggie');

		$monitor = new Monitor;

		if($request->input('image')) {
			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/monitor'), $imageName);

			$monitor->image = $imageName;
		}

		$monitor->name = $request->input('name');
		$monitor->first_name = $request->input('first_name');
		$monitor->birthday = $request->input('birthday');
		$monitor->extra_info = $request->input('extra_info');
		$monitor->phone_nr = $request->input('phone_nr');
		$monitor->allergies = $request->input('allergies');
		$monitor->isVeggie = (int)$boolVeggie;
		$monitor->user_id = $user['id'];

		$monitor->save();

		$user->account()->associate($monitor);
		$user->save();

		return redirect()->route('monitor.createAddress', ['moni_id' => $monitor['id']]);
	}

	public function search(Request $request) {
		$search = $request->input('search');
		$monitoren = Monitor::where('name', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();
		return view('content.monitor.overview', ['monitoren' => $monitoren, 'oldSearch' => $search]);
	}

	public function getAddWeek($moni_id) {
		$monitor = Monitor::findOrFail('id', $moni_id);
		$weeks = Week::orderBy('startdate', 'desc')->get();

		return view('content.week.add-week',
			[
				'monitor' => $monitor,
				'weeks' => $weeks
			]);
	}

	public function postAddWeek(Request $request, $moni_id){
		$nullEvent = Week::where('id', '0')->get();
		$monitor = Monitor::findOrFail('id', $moni_id);
		$user = $monitor->users()->first();

		$monitor->weeks()->sync(
			$request->input('events') === null
				? $nullEvent
				: $request->input('events')
		);

		return view('account',
			['user_id' => $user['id']]);
	}
}
