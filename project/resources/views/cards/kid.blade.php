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
		<div class="card__title">
			{{$kid['first_name']}} {{$kid['name']}}
		</div>
		<div class="card__text">
			{{ \Jenssegers\Date\Date::parse(strtotime($kid['birthday']))->format('j F Y') }}
		</div>
		<div class="card__text is-role">
			{{$kid['role']}}
		</div>
		checken of limiet kids is gepasseerd {{ config('global.max_kids') }}
	</div>
	
	
	@if(Auth::user()->role != 'admin')
		<div class="card__actions">
			<div>
				<a href="{{ route('kid.addDays', ['kid_id' => $kid['id']]) }}">
					@svg('calendar (3)')
				</a>
			</div>
			<div>
				@svg('edit')
			</div>
			<div>
				@svg('delete')
			</div>
		</div>
	@endif
	
@if(Auth::user()->role != 'admin')
	</div>
@else
	</a>
@endif