<a class="card for-family" href="">
	@if(File::exists(public_path() . "/images/guardian/" . $guardian['image']))
		<div class="card__image ctn-image">
			<img src="{{ asset('images/guardian/' . $guardian['image']) }}" alt="">
		</div>
	@endif
	<div class="card__content">
		<div class="card__title">
			{{$guardian['first_name']}} {{$guardian['name']}}
		</div>
		<div class="card__text">
			{{$guardian['phone_nr']}}
		</div>
		<div class="card__text is-role">
			{{$guardian['role']}}
		</div>
	</div>
	<div class="card__actions">
		
		<div>
			@svg('edit')
		</div>
		<div>
			@svg('delete')
		</div>
	</div>
</a>