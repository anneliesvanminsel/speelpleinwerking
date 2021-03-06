@extends('layouts.admin')
@section('title')
	Leiding - Speelgroepen
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1 class="grow">
				Overzicht speelgroepen
			</h1>
			<a href="{{ route('playgroup.create') }}" class="btn is-small for-admin">
				voeg een speelgroep toe
			</a>
		</div>
		
		<div class="teaser--container">
			@foreach($playgroups as $playgroup)
				<div class="teaser row">
					<div class="grid__image ctn-image">
						@if(File::exists(public_path() . "/images/playgroup/" . $playgroup['image']))
							<img src="{{ asset('/images/playgroup/' . $playgroup['image'] ) }}" alt="{{ $playgroup['name'] }}" loading="lazy">
						@else
							<img src="https://placekitten.com/600/600" alt="{{ $playgroup['name'] }}" loading="lazy">
						@endif
					</div>
					<div class="grow">
						<div class="row">
							<h3 class="teaser__title grow">
								{{$playgroup['name']}}
							</h3>
							<div class="teaser__actions">
								<a class="" href={{ route('playgroup.edit', ['playgroup_id' => $playgroup->id]) }}>
									@svg('edit', 'is-small')
								</a>
								<form
									class="form"
									method="POST"
									action="{{ route('playgroup.postDelete', ['playgroup_id' => $playgroup->id]) }}"
								>
									{{ csrf_field() }}
									<button class="" type="submit">
										@svg('delete', 'is-small')
									</button>
								</form>
							</div>
						</div>
						<div class="teaser__content">
							<div>
								{{ $playgroup['description'] }}
							</div>
							<div>
								{{  $playgroup['minAge'] }} - {{  $playgroup['maxAge'] }}
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection