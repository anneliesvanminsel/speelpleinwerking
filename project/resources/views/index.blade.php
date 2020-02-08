@extends('layouts.app')
@section('title')
	Speelpleinwerking
@endsection
@section('content')
	<div>
		<div class="hero">
			<div class="hero__image ctn-image">
				<img src="https://images.pexels.com/photos/1250346/pexels-photo-1250346.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Sfeerfoto">
			</div>
			<h1 class="hero__subtitel">
				Onze speelpleinwerking
			</h1>
			<p class="hero__description">
				Speelpleinwerking is een unieke jeugdwerkvorm en gedragen door de kracht van jongeren.
				Spelen om te spelen staat altijd voorop! <br>
				In onze speelpleinwerking streven we ernaar dat iedereen kan deelnemen.
			</p>
			<div class="hero__actions">
				<a class="btn for-family" href="{{ route('family') }}">Ouder</a>
				<a class="btn for-volunteer" href="{{ route('monitor') }}">Monitor</a>
				<a class="btn for-admin" href="{{ route('hoofdmonitoren') }}">Hoofdmonitor</a>
			</div>
		</div>
		
		@if($playgroups->count() > 0)
			<div class="section" id="playgroups">
				<div class="section__header">
					<h1 class="section__title">
						Onze speelgroepen
					</h1>
					<p class="section__description">
						We verdelen onze kinderen volgens leeftijd in groepen om hen samen met
						leeftijdsgenoten een fijne dag te garanderen.
					</p>
				</div>
				
				<div class="grid is-playgroup">
					@foreach($playgroups as $playgroup)
						<div class="grid__item">
							<div class="grid__image ctn-image">
								@if(File::exists(public_path() . "/images/playgroup/" . $playgroup['image']))
									<img src="{{ asset('/images/playgroup/' . $playgroup['image'] ) }}" alt="{{ $playgroup['name'] }}" loading="lazy">
								@else
									<img src="https://placekitten.com/600/600" alt="{{ $playgroup['name'] }}" loading="lazy">
								@endif
							</div>
							<div class="grid__content">
								<h3 class="grid__title">
									{{ $playgroup['name'] }}
								</h3>
								<div class="grid__text">
									{{ $playgroup['description'] }}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
		
		@if($activities->count() > 0)
			<div class="section" id="activities">
				<div class="section__header">
					<h1 class="section__title">
						Onze activiteiten
					</h1>
				</div>
				
				<div class="card--container">
					@foreach($activities as $activity)
						<div class="card is-activity">
							<div class="card__image ctn-image">
								@if(File::exists(public_path() . "/images/activity/" . $activity['image']))
									<img src="{{ asset('/images/activity/' . $activity['image'] ) }}" alt="{{ $activity['name'] }}" loading="lazy">
								@else
									<img src="https://placekitten.com/600/600" alt="{{ $activity['name'] }}" loading="lazy">
								@endif
							</div>
							<div class="card__content">
								<h3 class="card__title">
									{{ $activity['name'] }}
								</h3>
								<div class="card__text">
									{{ $activity['description'] }}
								</div>
							</div>
							@if($activity['link'] && $activity['linkText'])
								<div class="card__actions">
									<a href="{{ $activity['link'] }}" class="btn for-family">{{ $activity['linkText'] }}</a>
								</div>
							@endif
						</div>
					@endforeach
				</div>
			</div>
		@endif
		
		<div id="contact">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2517.2431483702967!2d4.7122213158142365!3d50.88220997953733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c160d33f0a3fa9%3A0xc05030830bac50f6!2sLeuven%20Station!5e0!3m2!1snl!2sbe!4v1580166635270!5m2!1snl!2sbe"
				width="600"
				height="450"
				frameborder="0"
				style="border:0;"
				allowfullscreen=""
			></iframe>
		</div>
		
		@if($sponsors->count() > 0)
			<div class="section" id="sponsors">
				<div class="section__header">
					<h1 class="section__title">
						Onze sponsors
					</h1>
					<p class="section__description">
						We verdelen onze kinderen volgens leeftijd in groepen om hen samen met
						leeftijdsgenoten een fijne dag te garanderen.
					</p>
				</div>
				
				<div class="grid">
					@foreach($sponsors as $sponsor)
						<div class="grid__item">
							<div class="grid__image ctn-image">
								@if(File::exists(public_path() . "/images/sponsor/" . $sponsor['image']))
									<img src="{{ asset('/images/sponsor/' . $sponsor['image'] ) }}" alt="{{ $sponsor['name'] }}" loading="lazy">
								@else
									<img src="https://placekitten.com/600/600" alt="{{ $sponsor['name'] }}" loading="lazy">
								@endif
							</div>
							<div class="grid__content">
								<h3 class="grid__title">
									{{ $sponsor['name'] }}
								</h3>
								<div class="grid__text">
									{{ $sponsor['information'] }}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection
