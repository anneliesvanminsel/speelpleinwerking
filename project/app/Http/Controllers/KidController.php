<?php

namespace App\Http\Controllers;

use App\Family;
use App\Kid;
use App\Day;
use App\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KidController extends Controller
{
    //
	public function getOverview() {
		$kids = Kid::orderBy('name', 'desc')->get();
		return view('content.kid.overview', ['kids' => $kids]);
	}

	public function getDetail($kid_id) {
		$kid = Kid::findOrFail($kid_id);

		return view('content.kid.detail', ['kid' => $kid]);
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
		$days = Day::orderBy('date', 'asc')->get();
		$weeks = Week::orderBy('startdate', 'asc')->get();

		return view('content.day.add-days',
			[
				'kid' => $kid,
				'days' => $days,
				'weeks' => $weeks
			]);
	}

	public function postDays(Request $request, $kid_id){

		$kid = Kid::where('id', $kid_id)->first();
		$familie = $kid->familie()->first();
		$user = User::where('id', $familie['user_id'])->first();

		$kid->events()->sync(
			$request->input('events') === null
				? $nullEvent
				: $request->input('events')
		);

		return redirect()->route('account', ['id' => $user['id']]);
	}
}
