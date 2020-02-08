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
		
		<div>
			<div>
				<span>Opgelet!: </span> <br>
				Een week start op zondagavond rond 17u en eindigt zaterdag om 14u. <br>
				Je kan je ook niet zelf uitschrijven voor een bepaalde week. Wil je dit toch doen,
				mail dan zo snel mogelijk naar <span class="info info--blue">info@lentekindvakantiewerking.be</span>.
			</div>
			<div>
				<span class="accent">Wachtlijst: </span>Je krijgt per week te zien hoeveel andere vrijwilligers zich hebben ingeschreven
				voor die week. Wanneer dat aantal op 15 zit, en jij je inschrijft voor die week, wordt je automatisch op een wachtlijst
				geplaatst. Moest er dan een plaatsje vrijkomen, zal je via mail verwittigd worden. <br>
				<span class="accent">Probeer je in te schrijven op weken waar nog geen 15 vrijwilligers opstaan.</span>
			</div>
			<form class="form" method="POST" action="{{route('moni.postAddWeek', ['moni_id' => $monitor['id'] ])}}">
				@csrf
				
				@foreach($weeks as $week)
					<div class="checkbox">
						<label class="checkbox__label">
							@php
								$totalVws = $week->monitors()->count();
							@endphp
							<input
								class="checkbox__input is-blue"
								type="checkbox"
								name="events[]"
								value="{{ $week['id'] }}"
								{{ $monitor->weeks->contains($week['id']) ? 'checked disabled' : '' }}
							>
							
							@if($monitor->weeks->contains($week['id']))
								<input type="hidden" name="events[]" value="{{$week['id']}}" />
							@endif
							
							<div class="checkbox__title">
								{{$week['name']}}:
							</div>
							<div class="checkbox__text">
								@php
									$start_time = strtotime($week['start_time']);
									$end_time = strtotime($week['end_time']);
								@endphp
								zondag {{date('d/m/Y', $start_time)}} t.e.m. zaterdag {{date('d/m/Y', $end_time)}}
							</div>
							<div class="accent is-total">
								{{ $totalVws }} / {{ $week->maxVolunteers }}
							</div>
						</label>
					</div>
				@endforeach
				
				<div class="form__actions">
					<a class="form__link is-red" href="{{ route('account', ['id' => Auth::user()->id]) }}">Annuleren</a>
					<button type="submit" class="button is-blue">
						Voeg de weken toe
					</button>
				</div>
			
			</form>
		</div>
	</div>
@endsection
