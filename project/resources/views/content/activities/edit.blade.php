@extends('layouts.admin')
@section('title')
	Leiding - Speelgroepen
@endsection

@section('content')
	<div class="section">
		
		<div class="breadcrumb">
			<a href="{{ route('activity.overview') }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		
		<h1>
			Bewerk speelgroep {{ $activity['name'] }}
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('activity.postEdit', ['playgroup_id' => $activity['id']]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="form__group">
				<input
					id="name"
					type="text"
					class="form__input for-admin @error('name') is-invalid @enderror"
					name="name"
					placeholder="Naam van de speelgroep"
					value="{{ $activity['name'] }}"
					required
					autofocus
					autocomplete="off"
				>
				
				<label for="name" class="form__label">
					Naam van de speelgroep
				</label>
				
				@error('name')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			
			<div class="form__group">
				<textarea
					form="form-create"
					id="description"
					class="form__input for-admin @error('description') is-invalid @enderror"
					name="description"
					placeholder="Een beschrijving van de speelgroep."
					required
					autocomplete="off"
					maxlength="1000"
				>{{ $activity['description'] }}</textarea>
				
				<label for="description" class="form__label">
					Beschrijving
				</label>
				
				@error('description')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div>
				<div class="ctn-image">
					@if(File::exists(public_path() . "/images/activity/" . $activity['image']))
						<img src="{{ asset('/images/activity/' . $activity['image'] ) }}" alt="{{ $activity['name'] }}" loading="lazy">
					@else
						<img src="https://placekitten.com/600/600" alt="{{ $activity['name'] }}" loading="lazy">
					@endif
				</div>
				
				<div class="form__group">
					<input
						id="image"
						type="file"
						class="form__input for-admin @error('image') is-invalid @enderror"
						name="image"
					>
					
					<label for="image" class="form__label">
						Nieuwe afbeelding
					</label>
					
					@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<h2>
				Inschrijvingsformulier
			</h2>
			<p>
				Indien mensen zich moeten inschrijven voor deze activiteit kan je hieronder een link meegeven. <br>
				Je kan ook de tekst op de knop aanpassen. Indien je geen tekst opgeeft, zal deze 'schrijf je nu in' weergeven.
			</p>
			<div class="form__group">
				<input
					id="link"
					type="text"
					class="form__input for-admin @error('link') is-invalid @enderror"
					name="link"
					placeholder="Link naar inschrijvingsformulier"
					value="{{ $activity['link'] }}"
				>
				
				<label for="link" class="form__label">
					Link naar inschrijvingsformulier
				</label>
				
				@error('name')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="form__group">
				<input
					id="linkText"
					type="text"
					class="form__input for-admin @error('linkText') is-invalid @enderror"
					name="linkText"
					placeholder="dd"
					value="{{ $activity['linkText'] }}"
				>
				
				<label for="linkText" class="form__label">
					Tekst voor de knop
				</label>
				
				@error('linkText')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			
			<div class="form__actions">
				<button type="submit" class="btn for-admin">
					Bewerk gegevens van activiteit {{ $activity['name'] }}
				</button>
			</div>
		</form>
	</div>
@endsection