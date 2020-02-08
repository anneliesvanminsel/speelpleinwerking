<a class="card for-family" href="#">
	@if(File::exists(public_path() . "/images/admin/" . $admin['image']))
		<div class="card__image ctn-image">
			<img src="{{ asset('images/admin/' . $admin['image']) }}" alt="">
		</div>
	@endif
	<div class="card__content">
		<div class="card__title">
			{{$admin['name']}} {{$admin['first_name']}}
		</div>
		<div class="card__text">
			{{date('d F Y',strtotime($admin['birthday']))}}
		</div>
		<div class="card__text is-role">
			{{$admin['role']}}
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