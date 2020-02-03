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
		
		<div class="grid">
			@foreach($activities as $activity)
				<div class="grid__item">
					<div class="grid__image ctn-image">
						@if(File::exists(public_path() . "/images/activity/" . $activity['image']))
							<img src="{{ asset('/images/activity/' . $activity['image'] ) }}" alt="{{ $activity['name'] }}" loading="lazy">
						@else
							<img src="https://placekitten.com/600/600" alt="{{ $activity['name'] }}" loading="lazy">
						@endif
					</div>
					<div class="grid__content">
						<h3>
							{{ $activity['name'] }}
						</h3>
						<div>
							{{ $activity['description'] }}
						</div>
						<div>
							<div>
								Jouw knop naar inschrijvingsformulier:
							</div>
							<a href="{{$activity['link']}}" target="_blank" class="btn for-admin">
								{{ $activity['linkText'] }}
							</a>
						</div>
					</div>
					<div class="grid__actions">
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
			@endforeach
		</div>
	</div>
@endsection