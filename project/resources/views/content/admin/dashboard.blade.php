@extends('layouts.admin')
@section('title')
	Leiding - Dashboard
@endsection

@section('content')
	@php
		$monicount = App\Monitor::all()->count();
		$kidscount = App\Kid::with("days")->has('days')->count();
	@endphp
	
	<div class="section row">
		<div class="grow">
			<h1>
				dashboard
			</h1>
		</div>
		<a href="{{ route('admin.newSummer') }}" class="btn is-small for-admin">
			Nieuwe zomer
		</a>
	</div>
	<div class="section row">
		<div class="recap for-volunteer">
			<div class="recap__wrapper">
				<div class="h-row">
					<div class="recap__text is-bold">
						{{ $monicount }}
					</div>
					<div class="recap__text is-small">
						monitoren <br> ingeschreven
					</div>
				</div>
			</div>
		</div>
		
		<div class="recap for-family">
			<div class="recap__wrapper">
				<div class="h-row">
					<div class="recap__text is-bold">
						{{ $kidscount }}<span class="recap__text is-small">  / {{ config('global.max_kids') }} </span>
					</div>
					<div class="recap__text is-small">
						geregistreerde <br> kinderen
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<h2 class="account__subheading">
			Data van registratie
		</h2>
		<div class="row has-two">
			{!! $chart->html() !!}
			{!! $kidchart->html() !!}
		</div>
	</div>
	
	<div class="section">
		<form action="" method="GET" class="search">
			<div class="search__group">
				<select name="event" class="select" onchange="this.form.submit()">
					<option value="1">Kies een event</option>
					@foreach($days as $day)
						@if($day['date'] == \Carbon\Carbon::today() || $day['date'] >= \Carbon\Carbon::today())
							<option value="{{$day['id']}}" class="search__option">
								{{ \Jenssegers\Date\Date::parse(strtotime($day['date']))->format('l j F Y') }}
							</option>
						@endif
					@endforeach
				</select>
			</div>
		</form>
	</div>
	
	{!! Charts::scripts() !!}
	{!! $chart->script() !!}
	{!! $kidchart->script() !!}
@endsection