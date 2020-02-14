@extends('layouts.admin')
@section('title')
	Leiding - Activiteiten
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('activity.overview') }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			Maak een activiteit aan
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('activity.postCreate') }}"
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
					placeholder="Naam van de activiteit"
					value="{{ old('name') }}"
					required
					autofocus
					autocomplete="off"
				>
				
				<label for="name" class="form__label">
					Naam van de activiteit
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
					placeholder="Een beschrijving van de activiteit."
					required
					autocomplete="off"
					maxlength="1000"
				>{{ old('description') }}</textarea>
				
				<label for="description" class="form__label">
					Beschrijving
				</label>
				
				@error('description')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="image"
					type="file"
					class="form__input for-admin @error('image') is-invalid @enderror"
					name="image"
					value="{{ old('image') }}"
					autocomplete="off"
				>
				
				<label for="image" class="form__label">
					Afbeelding
				</label>
				
				@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
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
					value="{{ old('link') }}"
					autocomplete="off"
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
					value="{{ old('linkText') }}"
					autocomplete="off"
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
					Maak de activiteit aan
				</button>
			</div>
		</form>
	</div>
@endsection