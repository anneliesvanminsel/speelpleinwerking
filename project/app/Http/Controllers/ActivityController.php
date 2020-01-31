<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
	public function getOverview() {
		$activities = Activity::orderBy('created_at', 'desc')->get();
		return view('content.activities.overview', ['activities' => $activities]);
	}

	public function getCreate() {
		return view('content.activities.create');
	}

	public function postCreate(Request $request) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'description' => 'required|string|max:255',
			'link' => 'nullable|string|max:255',
			'linkText' => 'nullable|string|max:255',
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$activity = new Activity;


		if(request()->image) {
			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/activity'), $imageName);

			$activity->image = $imageName;
		}

		$activity->name = $request->input('name');
		$activity->description = $request->input('description');
		$activity->link = $request->input('link');
		$activity->linkText = $request->input('linkText');

		$activity->save();

		return redirect()->route('activity.overview');
	}

	public function getEdit($activity_id) {
		$activity = Activity::findOrFail($activity_id);

		return view('content.activities.edit', ['activity' => $activity ]);
	}

	public function postEdit(Request $request, $activity_id) {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'description' => 'required|string|max:255',
			'link' => 'nullable|string|max:255',
			'linkText' => 'nullable|string|max:255',
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //image
		]);

		$activity = Activity::findOrFail($activity_id);

		if (request()->image) {
			$image_path = public_path() . "/images/activity/" . $activity['image'];  // Value is not URL but directory file path

			if(File::exists($image_path)) {
				File::delete($image_path);
			}

			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/activity/'), $imageName);

			$activity->image = $imageName;
		}

		$activity->name = $request->input('name');
		$activity->description = $request->input('description');
		$activity->link = $request->input('link');
		$activity->linkText = $request->input('linkText');

		$activity->save();

		return redirect()->route('activity.overview');
	}

	public function postDelete($activity_id) {
		$activity = Activity::findOrFail($activity_id);

		$image_path = public_path() . "/images/activity/" . $activity['image'];  // Value is not URL but directory file path

		if(File::exists($image_path)) {
			File::delete($image_path);
		}

		$activity->delete();

		return redirect()->route('activity.overview');
	}
}
