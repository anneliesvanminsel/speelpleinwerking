<?php

namespace App\Http\Controllers;

use App\Monitor;
use App\User;
use App\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitorController extends Controller
{
    //
	public function getOverview() {
		$monitoren = Monitor::orderBy('name', 'desc')->paginate(8);
		return view('content.monitor.overview', ['monitoren' => $monitoren, 'oldSearch' => '']);
	}

	public function getDetail($moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		return view('content.monitor.detail', ['monitor' => $monitor]);
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

	public function getEdit($moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		return view('content.monitor.edit', ['monitor' => $monitor]);
	}

	public function postEdit(Request $request, $moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

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

		$monitor->name = $request->input('name');
		$monitor->first_name = $request->input('first_name');
		$monitor->birthday = $request->input('birthday');
		$monitor->extra_info = $request->input('extra_info');
		$monitor->phone_nr = $request->input('phone_nr');
		$monitor->allergies = $request->input('allergies');
		$monitor->isVeggie = (int)$boolVeggie;

		if($request->input('image')) {
			$imageName = $monitor->first_name . '-' . $monitor->name .'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/monitor'), $imageName);

			$monitor->image = $imageName;
		}

		$monitor->save();

		return redirect()->route('account', ['user_id' => Auth::id()]);
	}

	public function search(Request $request) {
		$search = $request->input('search');
		$monitoren = Monitor::where('name', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->paginate(8);
		return view('content.monitor.overview', ['monitoren' => $monitoren, 'oldSearch' => $search]);
	}

	public function getAddWeek($moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		$weeks = Week::orderBy('startdate', 'asc')->get();

		return view('content.week.add-week',
			[
				'monitor' => $monitor,
				'weeks' => $weeks
			]);
	}

	public function postAddWeek(Request $request, $moni_id){
		$nullEvent = Week::where('id', '0')->get();
		$monitor = Monitor::findOrFail($moni_id);
		$user = $monitor->users()->first();

		$monitor->weeks()->sync(
			$request->input('events') === null
				? $nullEvent
				: $request->input('events')
		);

		return redirect()->route('account',
			['user_id' => $user['id']]);
	}

	public function postDeleteWeek($moni_id, $week_id) {
		$monitor = Monitor::findOrFail($moni_id);
		$week = Week::findOrFail($week_id);

		$weeks = Week::orderBy('startdate', 'asc')->get();

		$monitor->weeks()->detach($week['id']);

		return redirect()->route('week.overview', ['weeks' => $weeks]);
	}

	public function postInternship($moni_id, $week_id) {
		$monitor = Monitor::findOrFail($moni_id);
		$week = Week::findOrFail($week_id);
		$user = $monitor->users()->first();

		$checkWeek = $monitor->weeks()->find($week['id']);
		if($checkWeek->pivot->wantsIntern == 1) {
			$monitor->weeks()->sync([$week['id'] => [ 'wantsIntern' => false] ], false);
		} else {
			$monitor->weeks()->sync([$week['id'] => [ 'wantsIntern' => true] ], false);
		}


		return redirect()->route('account',
			['user_id' => $user['id']]);
	}
}
