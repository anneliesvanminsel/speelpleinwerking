<?php

namespace App\Http\Controllers;
use App\Faq;
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
		$playgroups = Playgroup::orderBy('minAge', 'asc')->get();
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
			return view('content.monitor.account', ['user' => $user]);
		}

		if($user->role === 'fam') {
			return view('content.family.account', ['user' => $user]);
		}

		return view('content.account', ['user' => $user]);
	}

	public function getDashboard($id){
		$user = User::where('id', $id)->first();

		return view('content.admin.dashboard', ['user_id' => $user['id'] ]);
	}

	public function getMonitorInformation(){
		$faqs = Faq::where('belongsTo', 'for-volunteer')->get();

		return view('page.moni-info', ['faqs' => $faqs]);
	}

	public function getFamilyInformation(){
		$faqs = Faq::where('belongsTo', 'for-family')->get();

		return view('page.fam-info', ['faqs' => $faqs]);
	}
}
