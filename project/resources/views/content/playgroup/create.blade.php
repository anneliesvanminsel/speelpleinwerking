@extends('layouts.admin')
@section('title')
	Leiding - Speelgroepen
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('playgroup.overview') }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			Maak een speelgroep aan
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('playgroup.postCreate') }}"
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
					value="{{ old('name') }}"
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
					required
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
				Leeftijd
			</h2>
			<p>
				Om de kinderen te verdelen in de speelgroepen
			</p>
			<div class="form__group">
				<input
					id="minAge"
					type="date"
					class="form__input for-admin @error('minAge') is-invalid @enderror"
					name="minAge"
					value="{{ old('minAge') }}"
					required
				>
				
				<label for="minAge" class="form__label">
					Eerste toegelate geboortedatum
				</label>
				
				@error('minAge')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="maxAge"
					type="date"
					class="form__input for-admin @error('maxAge') is-invalid @enderror"
					name="maxAge"
					placeholder="bv: 1/10/2022"
					value="{{ old('maxAge') }}"
					required
				>
				
				<label for="maxAge" class="form__label">
					Laatste toegelaten geboortedatum
				</label>
				
				@error('maxAge')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="form__actions">
				<button type="submit" class="btn for-admin">
					Maak de speelgroep aan
				</button>
			</div>
		</form>
	</div>
@endsection