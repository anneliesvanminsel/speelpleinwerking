@extends('layouts.admin')
@section('title')
	Speelplein - {{$kid['first_name']}} {{$kid['name']}}
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
				{{$kid['first_name']}} {{$kid['name']}}
			</h1>
			@if($kid['isActive'] == 0)
				<form class="form" onsubmit="return confirm('Ben je zeker dat je {{$kid["first_name"]}} {{$kid["name"]}} weer wilt laten inschrijven?');" method="POST" action="{{route('kid.resetIsActive', ['kid_id' => $kid['id']])}}">
					@csrf
					<button class="btn for-admin is-small" type="submit">
						Mag weer inschrijven
					</button>
				</form>
			@endif
		</div>
		
		
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
						Ingeschreven voor de onderstaande dagen
					</h2>
					<form class="form" onsubmit="return confirm('Ben je zeker dat je alle dagen wilt wissen van {{$kid["first_name"]}} {{$kid["name"]}} wilt verwijderen?');" method="POST" action="{{route('kid.deleteAllDays', ['kid_id' => $kid['id']])}}">
						@csrf
						<button class="btn for-admin is-small" type="submit">Verwijder ALLE dagen</button>
					</form>
				</div>
				<div class="account__section card--container is-overview">
					@foreach($kid->days()->orderBy('date')->get() as $day)
						<div class="card">
							<div class="card__content">
								<b>
									{{ \Jenssegers\Date\Date::parse(strtotime($day['date']))->format('l j F Y') }}
								</b>
							</div>
							<div class="card__content">
								<form action="{{ route('kid.attendance', ['kid_id' => $kid['id'], 'day_id' => $day['id']]) }}" method="POST" class="search">
									@csrf
									<div class="search__group">
										<div class="checkbox">
											<label class="checkbox__label">
												<input
													class="checkbox__input for-admin"
													type="checkbox"
													name="attendance"
													value="1"
													onchange="this.form.submit()"
													{{ $kid->days()->findOrFail($day['id'], ['day_id'])->pivot->isPresent === 1 ? 'checked' : '' }}
													{{ \Carbon\Carbon::parse($day['date']) < \Carbon\Carbon::today() ? 'disabled' : '' }}
												>
												Aanwezig
											</label>
										</div>
									</div>
								</form>
								<form action="{{ route('kid.paid', ['kid_id' => $kid['id'], 'day_id' => $day['id']]) }}" method="POST" class="search">
									@csrf
									<div class="search__group">
										<div class="checkbox">
											<label class="checkbox__label">
												<input
													class="checkbox__input for-admin"
													type="checkbox"
													name="paid"
													onchange="this.form.submit()"
													value="1"
													{{ $kid->days()->findOrFail($day['id'], ['day_id'])->pivot->hasPaid === 1 ? 'checked' : '' }}
												>
												Betaald
											</label>
										</div>
									</div>
								</form>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection