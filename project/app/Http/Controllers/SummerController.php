<?php

namespace App\Http\Controllers;

use App\Week;
use App\Day;
use Carbon\Carbon;
use \DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SummerController extends Controller
{
    //
	public function getCreate() {
		return view('content.summer.create');
	}

	public function postCreate(Request $request) {
		Week::truncate();
		Day::truncate();
		DB::table('monitor_week')->truncate();
		DB::table('kid_day')->truncate();

		$this->validate($request, [
			'startdate' => 'required|date',
			'enddate'=> 'required|date',
			'maxVolunteers'=> 'required|integer',
		]);

		$starttime = new DateTime($request->input('startdate'));
		$endtime = new DateTime($request->input('enddate'));

		$difference = $starttime->diff($endtime);

		for($i = 0; $i < $difference->d + 1; $i = ($i + 7)) {
			$j = $i + 6;
			$week = new Week([
				'startdate' => Carbon::parse(strtotime($request->input('startdate'). ' + ' . $i . ' days')),
				'enddate' => Carbon::parse(strtotime($request->input('startdate'). ' + ' . $j . ' days')),
				'maxVolunteers' => $request->input('maxVolunteers'),
			]);
			$week->save();

			for($x = 0; $x < $j + 1; $x++) {
				$date = Carbon::parse(strtotime($week['startdate']. ' + ' . $x . ' days'));

				if ($date->dayOfWeek === Carbon::MONDAY || $date->dayOfWeek === Carbon::TUESDAY || $date->dayOfWeek === Carbon::WEDNESDAY || $date->dayOfWeek === Carbon::THURSDAY || $date->dayOfWeek === Carbon::FRIDAY ) {
					$day = new Day([
						'date' => $date,
						'week_id' => $week['id']
					]);

					$day->save();
					$week->days()->save($day);
				}
			}
		}

		return redirect()->route('admin.dashboard', ['user_id', Auth::id()]);
	}
}
