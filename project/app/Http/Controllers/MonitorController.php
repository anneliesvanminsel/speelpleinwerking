<?php

namespace App\Http\Controllers;

use App\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    //
	public function getOverview() {
		$monitoren = Monitor::orderBy('name', 'desc')->get();
		return view('content.monitor.overview', ['monitoren' => $monitoren]);
	}
}

