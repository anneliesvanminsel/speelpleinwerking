@extends('layouts.admin')
@section('title')
	Speelplein - {{$monitor['first_name']}} {{$monitor['name']}}
@endsection
@section('content')
	<div class="article">
		<div class="breadcrumb">
			<a href="{{ url()->previous() }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<div class="row">
			<h1 class="grow">
				{{$monitor['first_name']}} {{$monitor['name']}}
			</h1>
			<div>
				<a href="{{ route('admin.create', ['monitor_id' => $monitor['id']]) }}" class="btn for-admin is-small">
					Maak hoofdleiding
				</a>
			</div>
		</div>
		
	</div>
	<div class="article">
		<div class="account__section">
			<h2 class="account__text">
				Account gegevens
			</h2>
			<div class="account__text">
				{{ $monitor->users()->first()->email }}
			</div>
			<div class="account__text">
				{{$monitor['phone_nr']}}
			</div>
		</div>
		
		<div class="account__section">
			<h3 class="account__text is-bold">
				Adresgegevens
			</h3>
			@include('cards.address', ['address' => $monitor->address()->first()])
		</div>
	</div>
	<div class="article">
		@if($monitor->contacts()->exists())
			<div  class="account__section row">
				<h2>
					Contactpersonen
				</h2>
			</div>
			
			<div class="account__section card--container">
				@foreach($monitor->contacts()->get() as $contact)
					@include('cards.contactperson', ['contact' => $contact])
				@endforeach
			</div>
		@endif
	</div>
	<div class="article">
		@if($monitor->weeks()->exists())
			<div class="account__section">
				<div class="row">
					<h2 class="grow">
						Ingeschreven voor de onderstaande weken
					</h2>
				</div>
				<div class="account__section">
					@foreach($monitor->weeks()->get() as $week)
						<div class="row">
							<div class="grow checkbox__title">
								{{ \Jenssegers\Date\Date::parse(strtotime($week['startdate']))->format('l j F Y') }}
								t.e.m. {{ \Jenssegers\Date\Date::parse(strtotime($week['enddate']))->format('l j F Y') }}
							</div>
							<div>
								@if($monitor->weeks()->findOrFail($week['id'], ['week_id'])->pivot->wantsIntern === 1)
									Wilt deze week stage lopen
								@endif
							</div>
						</div>
						<br>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection