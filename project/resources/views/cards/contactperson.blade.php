<div class="card for-volunteer" href="">
	@if($contact['image'] && File::exists(public_path() . "/images/contact/" . $contact['image']))
		<div class="card__image ctn-image">
			<img src="{{ asset('images/contact/' . $contact['image']) }}" alt="">
		</div>
	@endif
	<div class="card__content">
		<div class="card__title">
			{{$contact['first_name']}} {{$contact['name']}}
		</div>
		<div class="card__text">
			{{$contact['phone_nr']}}
		</div>
		<div class="card__text is-role">
			{{$contact['role']}}
		</div>
	</div>
	
	@if(Auth::user()->role != 'admin')
		<div class="card__actions">
			<div>
				@svg('edit')
			</div>
			<div>
				@svg('delete')
			</div>
		</div>
	@endif
</div>