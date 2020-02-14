<?php

namespace App\Http\Controllers;

use App\Family;
use App\Kid;
use App\Day;
use App\Week;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KidController extends Controller
{
    //
	public function getOverview() {
		$kids = Kid::orderBy('name', 'desc')->get();
		return view('content.kid.overview', ['kids' => $kids, 'oldSearch' => '']);
	}

	public function getDetail($kid_id) {
		$kid = Kid::findOrFail($kid_id);

		return view('content.kid.detail', ['kid' => $kid]);
	}

	public function search(Request $request) {
		$search = $request->input('search');
		$kids = Kid::where('name', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')->get();

		return view('content.kid.overview', ['kids' => $kids, 'oldSearch' => $search]);
	}

	public function getCreate($family_id) {
		$family = Family::findOrFail($family_id);

		return view('content.kid.create', ['family' => $family]);
	}

	public function postCreate(Request $request, $family_id)
	{
		$family = Family::findOrFail($family_id);

		$this->validate($request, [
			'image'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'name' => 'required|string|max:255',
			'first_name' => 'required|string|max:255',
			'birthday' => 'required|date',
			'doc_name'=> 'required|string|max:255',
			'doc_phone_nr'=> 'required|string|max:255',
			'tetanus_date' => 'required_if:hasTetanusShot,1',
			'medicins' => 'nullable|string|max:255',
			'allergies' => 'nullable|string|max:255',
			'info' => 'nullable|string|max:255',
		]);

		$boolSwim = $request->input('canSwim');
		$boolTetanus = $request->input('hasTetanusShot');

		$kid = new Kid([
			'name' => $request->input('name'),
			'first_name' => $request->input('first_name'),
			'birthday' => $request->input('birthday'),
			'canSwim'=> (int)$boolSwim,
			'hasTetanusShot'=> (int)$boolTetanus,
			'tetanus_date' => $request->input('tetanus_date'),
			'allergies'=> $request->input('allergies'),
			'medicins' => $request->input('medicins'),
			'doc_name' => $request->input('doc_name'),
			'doc_phone_nr' => $request->input('doc_phone_nr'),
			'info' => $request->input('info'),
			'family_id' => $family['id'],

		]);

		if(request()->image) {
			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			request()->image->move(public_path('images/kid/'), $imageName);

			$kid->image = $imageName;
		}

		$kid->save();
        $family->kids()->save($kid);

		return redirect()->route('account', ['user_id' => Auth::id()]);
	}

	public function addDays($kid_id){
		$kid = Kid::findOrFail($kid_id);
		$weeks = Week::orderBy('startdate', 'asc')->get();

		return view('content.day.add-days',
			[
				'kid' => $kid,
				'weeks' => $weeks
			]);
	}

	public function postDays(Request $request, $kid_id){
		$nullEvent = Day::where('id', '0')->get();

		$kid = Kid::where('id', $kid_id)->first();
		$familie = $kid->family()->first();
		$user = User::findOrfail($familie['user_id']);

		$kid->days()->sync(
			$request->input('days') === null
				? $nullEvent
				: $request->input('days')
		);

		return redirect()->route('account', ['id' => $user['id']]);
	}

	public function postDeleteDay($kid_id, $day_id) {
		$kid = Kid::findOrFail($kid_id);
		$day = Day::findOrFail($day_id);

		$weeks = Week::orderBy('startdate', 'asc')->get();

		$kid->days()->detach($day['id']);

		return redirect()->route('day.overview', ['weeks' => $weeks]);
	}

	public function postAttendance($kid_id, $day_id) {
		$kid = Kid::findOrFail($kid_id);
		$day = Day::findOrFail($day_id);
		$family = $kid->family()->first();
		$user = $family->users()->first();

		if($kid->days()->findOrFail($day['id'], ['day_id'])->pivot->isPresent === 0) {
			$kid->days()->sync([$day['id'] => [ 'isPresent' => true] ], false);
		} else {
			$kid->days()->sync([$day['id'] => [ 'isPresent' => false] ], false);
		}

		return redirect()->route('admin.dashboard',
			['user_id' => $user['id']]);
	}

	public function postPayment($kid_id, $day_id) {
		$kid = Kid::findOrFail($kid_id);
		$day = Day::findOrFail($day_id);
		$family = $kid->family()->first();
		$user = $family->users()->first();

		if($kid->days()->findOrFail($day['id'], ['day_id'])->pivot->hasPaid === 0) {
			$kid->days()->sync([$day['id'] => [ 'hasPaid' => true] ], false);
		} else {
			$kid->days()->sync([$day['id'] => [ 'hasPaid' => false] ], false);
		}


		return redirect()->route('admin.dashboard',
			['user_id' => $user['id']]);
	}
}
