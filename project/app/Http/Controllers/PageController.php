<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Charts;
use Illuminate\Support\Facades\DB;

use App\Kid;
use App\Day;
use App\Monitor;
use App\User;
use App\Playgroup;
use App\Sponsor;
use App\Activity;
use App\Admin;
use App\Faq;

class PageController extends Controller
{
    //
	public function getIndex(){
		$playgroups = Playgroup::orderBy('minAge', 'asc')->get();
		$sponsors = Sponsor::orderBy('created_at', 'desc')->get();
		$activities = Activity::orderBy('created_at', 'desc')->get();

		return view('index', ['playgroups' => $playgroups, 'sponsors' => $sponsors, 'activities' => $activities]);
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
			return redirect()->route('admin.dashboard', ['user_id' => $user['id']]);
		}

		if($user->role === 'moni') {
			return view('content.monitor.account', ['user' => $user]);
		}

		if($user->role === 'fam') {
			return view('content.family.account', ['user' => $user]);
		}

		return view('errors.401');
	}

	public function getDashboard($id){
		$user = User::where('id', $id)->first();
		$day = Day::where('date', '=', Carbon::today())->first();
		$kids = $day->kids()->get();

		$monitors = Monitor::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
		$kiddos = Kid::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();

		$chart = Charts::database($monitors, 'bar', 'highcharts')
			->title('Registratie vrijwilligers')
			->elementLabel('Totaal aantal vrijwilligers')
			->dimensions(300, 500)
			->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
			->groupByMonth(date('Y'), true);

		$kidchart = Charts::database($kiddos, 'bar', 'highcharts')
			->title('Registratie Kinderen')
			->elementLabel('Totaal aantal kinderen')
			->dimensions(300, 500)
			->colors(['yellow', 'orange', 'cyan', 'magenta', 'red', 'green', 'blue'])
			->groupByMonth(date('Y'), true);


		return view('content.admin.dashboard', ['user_id' => $user['id'], 'kids' => $kids, 'day' => $day , 'chart' => $chart, 'kidchart' => $kidchart]);
	}


	public function getMonitorInformation(){
		$faqs = Faq::where('belongsTo', 'for-volunteer')->get();

		return view('page.moni-info', ['faqs' => $faqs]);
	}

	public function getFamilyInformation(){
		$faqs = Faq::where('belongsTo', 'for-family')->get();

		return view('page.fam-info', ['faqs' => $faqs]);
	}

	public function getHoofdMonitor(){
		$admins = Admin::orderBy('created_at', 'desc')->get();

		return view('page.admin-info', ['admins' => $admins]);
	}
}
