@extends('layouts.moni')
@section('title')
	Monitor - inschrijven
@endsection
@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1 class="user-subscribe__heading">
			Schrijf je in voor een week (of twee)
		</h1>
	</div>
		
	<div class="article">
		<div class="article__text">
			<b>Opgelet!: </b> <br>
			Je kan je ook niet zelf uitschrijven voor een bepaalde week. Wil je dit toch doen,
			mail dan zo snel mogelijk naar <a href="mailto:speelplein@anneliesvanminsel.be">info@speelplein.be</a>.
		</div>
		<div class="article__text">
			<b>Wachtlijst: </b> <br>
			Je krijgt per week te zien hoeveel andere vrijwilligers zich hebben ingeschreven
			voor die week. Moest er dan een plaatsje vrijkomen, zal je via mail verwittigd worden. <br> <br>
			<b>Probeer je in te schrijven op weken waar de limiet nog niet werd overschreden.</b>
		</div>
	</div>
	
		<form class="form article" method="POST" action="{{route('moni.postAddWeek', ['moni_id' => $monitor['id'] ])}}">
			@csrf
			
			@foreach($weeks as $week)
				<div class="checkbox">
					<label class="checkbox__label">
						
						<input
							class="checkbox__input for-volunteer"
							type="checkbox"
							name="events[]"
							value="{{ $week['id'] }}"
							{{ $monitor->weeks->contains($week['id']) ? 'checked disabled' : '' }}
						>
						
						@if($monitor->weeks->contains($week['id']))
							<input type="hidden" name="events[]" value="{{$week['id']}}" />
						@endif
						
						<div>
							<span class="checkbox__title">
								Week {{ $week['id'] }}:
							</span>
							{{ \Jenssegers\Date\Date::parse(strtotime($week['startdate']))->format('l j F Y') }}
							t.e.m. {{ \Jenssegers\Date\Date::parse(strtotime($week['enddate']))->format('l j F Y') }}
						</div>
						<div class="accent is-total">
							{{ $week->monitors()->count() }}/ {{ $week->maxVolunteers }}
						</div>
					</label>
				</div>
			@endforeach
			
			<div class="form__actions">
				<button type="submit" class="btn for-volunteer">
					Voeg de weken toe
				</button>
			</div>
		
		</form>
	</div>
@endsection
