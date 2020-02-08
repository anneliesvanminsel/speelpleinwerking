<a class="card for-volunteer" href="">
	@if($moni['image'] && File::exists(public_path() . "/images/monitor/" . $moni['image']))
		<div class="card__image ctn-image">
			<img src="{{ asset('images/monitor/' . $moni['image']) }}" alt="">
		</div>
	@endif
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
