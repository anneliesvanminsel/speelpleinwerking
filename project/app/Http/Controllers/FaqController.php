<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
	public function getOverview() {
		$faqs = Faq::orderBy('created_at', 'desc')->get();
		return view('content.faq.overview', ['faqs' => $faqs]);
	}
}
