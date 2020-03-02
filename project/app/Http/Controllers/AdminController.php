<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Day;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
	public function getCurrentAdmins(){
		$admins = Admin::where('isActive', '=', 1)->paginate(20);
		return view('content.admin.overview-current', ['admins' => $admins]);
	}

	public function getOldAdmins(){
		$admins = Admin::where('isActive', '=', 0)->paginate(20);
		return view('content.admin.overview-old', ['admins' => $admins]);
	}

	public function postSearchKids(Request $request){
		$day_id = $request->input('day');
		$user = User::findOrFail(Auth::id());

		$days = Day::orderBy('date', 'asc')->get();
		$kids = Day::findOrFail($day_id)->kids()->get();
		$oldDay = $day_id;

		return view('content.admin.dashboard', ['user_id' => $user['id'], 'days' => $days, 'kids' => $kids, 'oldDay' => $oldDay]);
	}

	public function postSearchCurrentAdmin () {
		$admins = Admin::where('isActive', '=', 1)->paginate(20);

		return view('content.admin.overview-current', ['admins' => $admins]);
	}

	public function postSearchOldAdmin () {
		$admins = Admin::where('isActive', '=', 0)->paginate(20);

		return view('content.admin.overview-old', ['admins' => $admins]);
	}
}