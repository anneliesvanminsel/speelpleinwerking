<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Kid;
use App\User;
use App\Playgroup;

class PageController extends Controller
{
    //
	public function getIndex(){
		$playgroups = Playgroup::orderBy('created_at', 'desc')->get();
		//$sponsors = Sponsor::orderBy('created_at', 'desc')->get();
		//$activities = Activity::orderBy('created_at', 'desc')->get();

		return view('index', ['playgroups' => $playgroups]);
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
			$kids = Kid::orderBy('familie_id', 'asc')->orderBy('name', 'asc')->paginate(10);
			return view('admin.index', ['user_id' => $user['id'], 'kids' => $kids, 'oldSearch' => '', 'oldEvent' => '1']);
		}

		if($user->role === 'vw') {
			return view('volunteer.account', ['user' => $user]);
		}

		if($user->role === 'familie') {
			return view('ouders.account', ['user' => $user]);
		}

		return view('content.account', ['user' => $user]);
	}
}
