@extends('layouts.admin')
@section('title')
	Leiding - Speelgroepen
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht speelgroepen
			</h1>
			<a href="{{ route('playgroup.create') }}">
				voeg een speelgroep toe
			</a>
		</div>
		
		<div class="grid">
			@foreach($playgroups as $playgroup)
				<div class="grid__item">
					<div class="grid__image ctn-image">
						@if(File::exists(public_path() . "/images/playgroup/" . $playgroup['image']))
							<img src="{{ asset('/images/playgroup/' . $playgroup['image'] ) }}" alt="{{ $playgroup['name'] }}" loading="lazy">
						@else
							<img src="https://placekitten.com/600/600" alt="{{ $playgroup['name'] }}" loading="lazy">
						@endif
					</div>
					<div class="grid__content">
						<h3>
							{{$playgroup['name']}}
						</h3>
						<div>
							{{$playgroup['description']}}
						</div>
						<div>
							{{  date('d/m/Y', strtotime( $playgroup['minAge'])) }} - {{  date('d/m/Y', strtotime( $playgroup['maxAge'])) }}
						</div>
						<div class="grid__actions">
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
				</div>
			@endforeach
		</div>
	</div>
@endsection