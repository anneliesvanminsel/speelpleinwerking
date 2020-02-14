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
						Ingeschreven voor de onderstaande dagen
					</h2>
				</div>
				<div class="account__section card--container">
					@foreach($kid->days()->get() as $day)
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