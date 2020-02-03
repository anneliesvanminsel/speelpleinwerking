<a class="card for-family" href="">
	@if(File::exists(public_path() . "/images/kid/" . $kid['image']))
		<div class="card__image ctn-image">
			<img src="{{ asset('images/kid/' . $kid['image']) }}" alt="">
		</div>
	@endif
	<div class="card__content">
		<div class="card__title">
			{{$kid['first_name']}} {{$kid['name']}}
		</div>
		<div class="card__text">
			{{date('d F Y',strtotime($kid['birthday']))}}
		</div>
		<div class="card__text is-role">
			{{$kid['role']}}
		</div>
	</div>
	<div class="card__actions">
		<div>
			@svg('calendar (3)')
		</div>
		<div>
			@svg('edit')
		</div>
		<div>
			@svg('delete')
		</div>
	</div>
</a>