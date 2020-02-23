@if(Auth::user()->role != 'admin')
	<div class="card for-family">
@else
	<a href="{{ route('kid.detail', ['kid_id' => $kid['id']]) }}" class="card for-family">
@endif
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
			@if($kid['hasTetanusShot'] == 1)
				<p class="card__text">
					Ingeënt tegen tetanus op {{ \Jenssegers\Date\Date::parse(strtotime($kid['tetanus_date']))->format('d/m/Y') }}
				</p>
			@endif
			<p class="card__text">
				Dokter {{ $kid['doc_name'] }} - {{ $kid['doc_phone_nr'] }}
			</p>
		</div>
		
		<div class="card__text">
			{{ $kid['info'] }}
		</div>
		@if($kid['canSwim'] == 1)
			<div class="card__text">
				Kan zwemmen!
			</div>
		@endif
		checken of limiet kids is gepasseerd {{ config('global.max_kids') }}
	</div>
	
	
	@if(Auth::user()->role != 'admin')
		<div class="card__actions">
			<a href="{{ route('kid.edit', ['kid_id' => $kid['id']]) }}" class="btn btn--icon for-family">
				@svg('edit')
			</a>
			<a href="{{ route('kid.addDays', ['kid_id' => $kid['id']]) }}" class="btn btn--icon for-family">
				@svg('calendar (3)')
			</a>
		</div>
	@endif
	
@if(Auth::user()->role != 'admin')
	</div>
@else
	</a>
@endif