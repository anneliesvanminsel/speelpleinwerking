@php
	$count = 0;
	$daycount = 0;
	$diff = 0;
@endphp
@foreach( $kid->days()->get() as $day)
	@if(\Carbon\Carbon::parse($day['date']) < \Carbon\Carbon::today())
		@php
			$daycount++;
		@endphp
		@if($day->pivot->isPresent == 1)
			@php
				$count++;
			@endphp
		@endif
	@endif
@endforeach
@php
	$diff = $daycount - $count;
@endphp

<a href="{{ route('kid.detail', ['kid_id' => $kid['id']]) }}" class="card for-family {{ $diff >= 3 ? 'has-warning' : ''}} {{ $diff >= 5 ? 'has-error' : ''}} {{ $kid->days()->count() == 0 ? 'has-none' : ''}} {{ $kid->isActive == 0 ? 'invalid' : ''}}">
	@if($kid['image'] && File::exists(public_path() . "/images/kid/" . $kid['image']))
		<div class="card__image ctn-image">
			<img src="{{ asset('images/kid/' . $kid['image']) }}" alt="">
		</div>
	@endif
	<div class="card__content">
		<p class="card__title">
			{{$kid['first_name']}} {{$kid['name']}}
		</p>
		<p class="card__text">
			{{ \Jenssegers\Date\Date::parse(strtotime($kid['birthday']))->format('j F Y') }}
		</p>
		<div class="card__section" style="border-bottom: none">
			<form action="{{ route('kid.attendance', ['kid_id' => $kid['id'], 'day_id' => $oldDay ]) }}" method="POST" class="search">
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
								{{ $kid->days()->findOrFail($oldDay, ['day_id'])->pivot->isPresent === 1 ? 'checked' : '' }}
							>
							Aanwezig
						</label>
					</div>
				</div>
			</form>
			
			<form action="{{ route('kid.paid', ['kid_id' => $kid['id'], 'day_id' => $oldDay]) }}" method="POST" class="search">
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
								{{ $kid->days()->findOrFail($oldDay, ['day_id'])->pivot->hasPaid === 1 ? 'checked' : '' }}
							>
							Betaald
						</label>
					</div>
				</div>
			</form>
		</div>
		<div class="card__section">
			<h5 class="card__subtitle">
				Medische gegevens
			</h5>
			@if($kid['medicins'])
				<p class="card__text">
					Medicijnen: <br> {{ $kid['medicins'] }}
				</p>
			@endif
			@if($kid['allergies'])
				<p class="card__text">
					Allergieën: <br> {{ $kid['allergies'] }}
				</p>
			@endif
			<p class="card__text">
				Dokter {{ $kid['doc_name'] }} - {{ $kid['doc_phone_nr'] }}
			</p>
		</div>
		
		<div class="card__text">
			{{ $kid['info'] }}
		</div>
		
	</div>
</a>