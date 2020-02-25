<a class="card for-family" href="{{ route('monitor.detail', ['moni_id' => $user->account()->first()->id]) }}">
	<div class="card__content">
		<div class="card__text">
			{{ $user->email }}
		</div>
		
		<div class="card__section">
			<h5 class="card__subtitle">
				Kinderen
			</h5>
			<div class="card__text">
				@foreach($user->account()->first()->kids()->get() as $kid)
					{{ $kid['first_name'] }} {{ $kid['name'] }}
				@endforeach
			</div>
		</div>
		<div>
			<h5 class="card__subtitle">
				Ouders / voogden
			</h5>
			<div class="card__text">
				@foreach($user->account()->first()->guardians()->get() as $guardian)
					{{ $guardian['first_name'] }} {{ $guardian['name'] }}
				@endforeach
			</div>
		</div>
	</div>
</a>
