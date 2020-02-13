@extends('layouts.admin')
@section('title')
	Speelplein - {{$kid['first_name']}} {{$kid['name']}}
@endsection
@section('content')
	<div class="article">
		<h1>
			{{$kid['first_name']}} {{$kid['name']}}
		</h1>
	</div>
	<div class="article">
		<div class="account__section">
			<h2 class="account__text">
				Account gegevens
			</h2>
			<div class="account__text">
				{{ $kid->family()->first()->users()->first()->email }}
			</div>
			<div class="account__text">
				{{$kid['phone_nr']}}
			</div>
		</div>
		
		<div class="account__section">
			<h3 class="account__text is-bold">
				Adresgegevens
			</h3>
			@include('cards.address', ['address' => $kid->family()->first()->address()->first()])
		</div>
	</div>
	<div class="article">
		@if($kid->family()->first()->guardians()->exists())
			<div  class="account__section row">
				<h2>
					Contactpersonen
				</h2>
			</div>
			
			<div class="account__section card--container">
				@foreach($kid->family()->first()->guardians()->get() as $contact)
					@include('cards.guardian', ['guardian' => $contact])
				@endforeach
			</div>
		@endif
	</div>
	<div class="article">
		@if($kid->days()->exists())
			<div class="account__section">
				<div class="row">
					<h2 class="grow">
						Ingeschreven voor de onderstaande weken
					</h2>
				</div>
				<div class="account__section">
					@foreach($kid->days()->get() as $week)
						<div class="article__section">
							@php
								$start_time = strtotime($week['start_time']);
								$end_time = strtotime($week['end_time']);
							@endphp
							{{ \Jenssegers\Date\Date::parse(strtotime($week['startdate']))->format('l j F Y') }}
							t.e.m. {{ \Jenssegers\Date\Date::parse(strtotime($week['enddate']))->format('l j F Y') }}
						</div>
						<br>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection