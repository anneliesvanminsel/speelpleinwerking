<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Kid;
use App\User;
use App\Playgroup;
use App\Sponsor;
use App\Activity;

class PageController extends Controller
{
    //
	public function getIndex(){
		$playgroups = Playgroup::orderBy('created_at', 'desc')->get();
		$sponsors = Sponsor::orderBy('created_at', 'desc')->get();
		$activities = Activity::orderBy('created_at', 'desc')->get();

		return view('index', ['playgroups' => $playgroups, 'sponsors' => $sponsors, 'activities' => $activities]);
	}

	public function getHoofdleiding(){
		return view('content.hoofdleiding');
	}

	public function getCookiebeleid(){
		return view('content.cookiebeleid');
	}

	public function getPrivacybeleid(){
		return view('content.privacybeleid');
	}

	public function getAccount($id){
		$user = User::where('id', $id)->first();

		if(is_null($user)) {
			return view('errors.401');
		}

		if($user->role === 'admin') {

			return view('content.admin.dashboard', ['user_id' => $user['id'] ]);
		}

		if($user->role === 'vol') {
			return view('volunteer.account', ['user' => $user]);
		}

		if($user->role === 'fam') {
			return view('ouders.account', ['user' => $user]);
		}

		return view('content.account', ['user' => $user]);
	}

	public function getDashboard($id){
		$user = User::where('id', $id)->first();

		return view('content.admin.dashboard', ['user_id' => $user['id'] ]);
	}
}
