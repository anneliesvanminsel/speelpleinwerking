<a class="card for-volunteer" href="{{ route('monitor.detail', ['moni_id' => $moni['id']]) }}">
	<div class="card__image ctn-image">
		@if($moni['image'] && File::exists(public_path() . "/images/monitor/" . $moni['image']))
			<img src="{{ asset('images/monitor/' . $moni['image']) }}" alt="{{$moni['first_name']}} {{$moni['name']}}">
		@else
			<img src="http://placekitten.com/g/400/400" alt="Placeholder image for {{$moni['first_name']}} {{$moni['name']}}">
		@endif
	</div>
	<div class="card__content">
		<div class="card__title">
			{{$moni['first_name']}} {{$moni['name']}}
		</div>
		<div class="card__text">
			{{$moni['phone_nr']}}
		</div>
		<div class="card__text">
			@php
				$user = $moni->users()->first();
			@endphp
			{{ $user['email'] }}
		</div>
		
	</div>
</a>
