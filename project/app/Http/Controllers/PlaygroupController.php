<?php

namespace App\Http\Controllers;

use App\Playgroup;
use \DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlaygroupController extends Controller
{
    //
	public function getOverview() {
		$playgroups = Playgroup::orderBy('created_at', 'desc')->get();
		return view('content.playgroup.overview', ['playgroups' => $playgroups]);
	}

	public function getCreate() {
		return view('content.playgroup.create');
	}

	public function postCreate(Request $request) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'minAge'=> 'required|date',
			'maxAge'=> 'required|date',
			'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->image->getClientOriginalExtension();
		request()->image->move(public_path('images/playgroup'), $imageName);

		$playgroup = new Playgroup([
			'name' => $request->input('name'),
			'image' => $imageName,
			'description'=> $request->input('description'),
			'minAge' => $request->input('minAge'),
			'maxAge' => $request->input('maxAge'),
		]);

		$playgroup->save();

		return redirect()->route('playgroup.overview');
	}

	public function getEdit($playgroup_id) {
		$playgroup = Playgroup::findOrFail($playgroup_id);

		return view('content.playgroup.create', ['playgroup' => $playgroup]);
	}

	public function postEdit(Request $request, $playgroup_id) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'minAge'=> 'required|date',
			'maxAge'=> 'required|date',
			'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$imageName = time().'.'.request()->image->getClientOriginalExtension();
		request()->image->move(public_path('images/playgroup'), $imageName);

		$playgroup = Playgroup::findOrFail($playgroup_id);

		$playgroup->name = $request->input('name');
		$playgroup->image = $imageName;
		$playgroup->description = $request->input('description');
		$playgroup->minAge = $request->input('minAge');
		$playgroup->maxAge = $request->input('maxAge');

		$playgroup->save();

		return redirect()->route('playgroup.overview');
	}

	public function postDelete($playgroup_id) {
		$playgroup = Playgroup::findOrFail($playgroup_id);
		$playgroup->delete();

		return redirect()->route('playgroup.overview');
	}
}
