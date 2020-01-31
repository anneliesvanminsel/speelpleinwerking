<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SponsorController extends Controller
{
    //
	public function getOverview() {
		$sponsors = Sponsor::orderBy('created_at', 'desc')->get();
		return view('content.sponsor.overview', ['sponsors' => $sponsors]);
	}

	public function getCreate() {
		return view('content.sponsor.create');
	}

	public function postCreate(Request $request) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'information' => 'required|string|max:1000',
			'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->image->getClientOriginalExtension();
		request()->image->move(public_path('images/sponsor'), $imageName);

		$sponsor = new Sponsor([
			'name' => $request->input('name'),
			'image' => $imageName,
			'information'=> $request->input('information'),
		]);

		$sponsor->save();

		return redirect()->route('playgroup.overview');
	}

	public function getEdit($sponsor_id) {
		$sponsor = Sponsor::findOrFail($sponsor_id);

		return view('content.sponsor.edit', ['sponsor' => $sponsor]);
	}

	public function postEdit(Request $request, $sponsor_id) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'information' => 'required|string|max:1000',
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);


		$sponsor = Sponsor::findOrFail($sponsor_id);

		if (request()->image) {
			$image_path = public_path() . "/images/sponsor/" . $sponsor['image'];  // Value is not URL but directory file path

			if(File::exists($image_path)) {
				File::delete($image_path);
			}

			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/playgroup/'), $imageName);

			$sponsor->image = $imageName;
		}

		$sponsor->name = $request->input('name');
		$sponsor->information = $request->input('information');

		$sponsor->save();

		return redirect()->route('sponsor.overview');
	}

	public function postDelete($sponsor_id) {
		$sponsor = Sponsor::findOrFail($sponsor_id);
		$sponsor->delete();

		return redirect()->route('sponsor.overview');
	}
}