@extends('layouts.admin')
@section('title')
	Leiding - Activiteiten
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1 class="grow">
				Overzicht activiteiten
			</h1>
			<a href="{{ route('activity.create') }}" class="btn is-small for-admin">
				voeg een activiteit toe
			</a>
		</div>
		
		<div class="container">
			@foreach($activities as $activity)
				<div class="teaser row">
					@if($activity['image'] && File::exists(public_path() . "/images/activity/" . $activity['image']))
						<div class="grid__image ctn-image">
							<img src="{{ asset('/images/activity/' . $activity['image'] ) }}" alt="{{ $activity['name'] }}" loading="lazy">
						</div>
					@endif
					
					<div class="grow">
						<div class="row">
							<h3 class="grow">
								{{ $activity['name'] }}
							</h3>
							<div class="teaser__actions">
								<a class="" href={{ route('activity.edit', ['activity_id' => $activity->id]) }}>
									@svg('edit', 'is-small')
								</a>
								<form
									class="form"
									method="POST"
									action="{{ route('activity.postDelete', ['activity_id' => $activity->id]) }}"
								>
									{{ csrf_field() }}
									<button class="" type="submit">
										@svg('delete', 'is-small')
									</button>
								</form>
							</div>
						</div>
						
						<div class="teaser__content">
							{{ $activity['description'] }}
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection