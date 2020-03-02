<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Monitor;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //'question', 'answer', 'belongsTo',
	public function getOverview() {
		$faqs = Faq::orderBy('created_at', 'desc')->get();

		return view('content.faq.overview', ['faqs' => $faqs]);
	}

	public function search(Request $request) {
		$faqs = Faq::where('belongsTo', '=', $request->input('belongsTo'))->get();

		return view('content.faq.overview', ['faqs' => $faqs]);
	}

	public function getCreate() {
		return view('content.faq.create');
	}

	public function postCreate(Request $request) {
		$this->validate($request, [
			'question' => 'required|string|max:255',
			'answer'=> 'required|string|max:1000',
			'belongsTo'=> 'required|string|max:255',
		]);

		$faq = new Faq([
			'question' => $request->input('question'),
			'answer' => $request->input('answer'),
			'belongsTo' => $request->input('belongsTo'),
		]);

		$faq->save();

		return redirect()->route('faq.overview');
	}

	public function getEdit($faq_id) {
		$faq = Faq::findOrFail($faq_id);

		return view('content.faq.edit', ['faq' => $faq]);
	}

	public function postEdit(Request $request, $faq_id) {
		$faq = Faq::findOrFail($faq_id);

		$this->validate($request, [
			'question' => 'required|string|max:255',
			'answer'=> 'required|string|max:1000',
			'belongsTo'=> 'required|string|max:255',
		]);

		$faq->question = $request->input('question');
		$faq->answer = $request->input('answer');
		$faq->belongsTo = $request->input('belongsTo');

		$faq->save();

		return redirect()->route('faq.overview');
	}

	public function postDelete($faq_id) {
		$faq = Faq::findOrFail($faq_id);

		$faq->delete();

		return redirect()->route('faq.overview');
	}
}
