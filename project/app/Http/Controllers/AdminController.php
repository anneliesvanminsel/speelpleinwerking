<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

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
}
