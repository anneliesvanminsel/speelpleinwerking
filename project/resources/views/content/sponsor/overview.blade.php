@extends('layouts.admin')
@section('title')
	Leiding - Sponsors
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1 class="grow">
				Overzicht sponsors
			</h1>
			<a href="{{ route('sponsor.create') }}" class="btn is-small for-admin">
				voeg een sponsor toe
			</a>
		</div>
		
		<div class="grid">
			@foreach($sponsors as $sponsor)
				<div class="grid__item">
					<div class="grid__image ctn-image">
						@if(File::exists(public_path() . "/images/sponsor/" . $sponsor['image']))
							<img src="{{ asset('/images/sponsor/' . $sponsor['image'] ) }}" alt="{{ $sponsor['name'] }}" loading="lazy">
						@else
							<img src="https://placekitten.com/600/600" alt="{{ $sponsor['name'] }}" loading="lazy">
						@endif
					</div>
					<div class="grid__content">
						<h3>
							{{$sponsor['name']}}
						</h3>
						<div>
							{{$sponsor['information']}}
						</div>
					</div>
					<div class="grid__actions">
						<a class="" href={{ route('sponsor.edit', ['sponsor_id' => $sponsor->id]) }}>
							@svg('edit', 'is-small')
						</a>
						<form
							class="form"
							method="POST"
							action="{{ route('sponsor.postDelete', ['sponsor_id' => $sponsor->id]) }}"
						>
							{{ csrf_field() }}
							<button class="" type="submit">
								@svg('delete', 'is-small')
							</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection