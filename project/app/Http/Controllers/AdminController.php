<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Day;
use App\Monitor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
	public function getCurrentAdmins() {
		$admins = Admin::where('isActive', '=', 1)->paginate(20);
		return view('content.admin.overview-current', ['admins' => $admins]);
	}

	public function getOldAdmins() {
		$admins = Admin::where('isActive', '=', 0)->paginate(20);
		return view('content.admin.overview-old', ['admins' => $admins]);
	}

	public function getCreate($moni_id) {
		$monitor = Monitor::findOrFail($moni_id);

		return view('content.admin.create', ['monitor' => $monitor]);
	}

	public function postCreate(Request $request, $moni_id) {
		$monitor = Monitor::findOrFail($moni_id);
		$user = User::findOrFail($monitor->users()->first()->id);

		$admin = new Admin;

		$user->account()->detach();

		$dt = new Carbon();
		$before = $dt->subYears(18)->format('Y-m-d');

		$this->validate($request, [
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
			'name' => 'required|string|max:255',
			'first_name' => 'required|string|max:255',
			'birthday' => 'required|date|before:' . $before,
			'extra_info' => 'nullable|string|max:255',
			'introtext' => 'nullable|string|max:1000',
			'phone_nr'=> 'required|string|max:255',
			'isVeggie' => 'nullable|string|max:255',
			'allergies' => 'nullable|string|max:255',
		]);

		$boolVeggie = $request->input('isVeggie');

		if ($boolVeggie === '1') {
			$boolVeggie = 1;
		} else {
			$boolVeggie = 0;
		}

		$admin->name = $request->input('name');
		$admin->first_name = $request->input('first_name');
		$admin->birthday = $request->input('birthday');
		$admin->extrainfo = $request->input('extra_info');
		$admin->phone_nr = $request->input('phone_nr');
		$admin->allergies = $request->input('allergies');
		$admin->introtext = $request->input('introtext');
		$admin->isActive = (int)1;
		$admin->isVeggie = (int)$boolVeggie;
		$admin->user_id = $user['id'];
		$admin->address_id = $monitor->address()->first()->id;

		if($request->input('image')) {
			$imageName = $admin->first_name . '-' . $admin->name .'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/admin'), $imageName);

			$admin->image = $imageName;
		}

		$admin->save();

		$user->role = 'admin';
		$user->account()->associate($admin);
		$user->save();
		$monitor->contacts()->delete();
		$monitor->weeks()->delete();
		$monitor->delete();

		$days = Day::orderBy('date', 'asc')->get();
		$day = Day::where('date', '=', Carbon::today())->first();
		$oldDay = $day['id'];
		$kids = Day::findOrFail($oldDay)->kids()->get();

		return redirect()->route('admin.dashboard',
			['user_id' => $user['id'], 'days' => $days, 'kids' => $kids, 'oldDay' => $oldDay]
		);
	}

	public function postSearchKids(Request $request) {
		$day_id = $request->input('day');
		$user = User::findOrFail(Auth::id());

		$days = Day::orderBy('date', 'asc')->get();
		$kids = Day::findOrFail($day_id)->kids()->get();
		$oldDay = $day_id;

		return view('content.admin.dashboard', ['user_id' => $user['id'], 'days' => $days, 'kids' => $kids, 'oldDay' => $oldDay]);
	}

	public function postSearchCurrentAdmin() {
		$admins = Admin::where('isActive', '=', 1)->paginate(20);

		return view('content.admin.overview-current', ['admins' => $admins]);
	}

	public function postSearchOldAdmin() {
		$admins = Admin::where('isActive', '=', 0)->paginate(20);

		return view('content.admin.overview-old', ['admins' => $admins]);
	}
}