@extends('layouts.app')
@section('title')
	Mijn account - Kind inschrijven
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			Schrijf een kind in
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('kid.postCreate', ['family_id' => $family['id']]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="form__group">
				<input
					id="image"
					type="file"
					class="form__input for-family @error('image') is-invalid @enderror"
					name="image"
					value="{{ old('image') }}"
				>
				
				<label for="image" class="form__label">
					Foto van jouw kind
				</label>
				
				@error('image')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="first_name"
					type="text"
					class="form__input for-family @error('name') is-invalid @enderror"
					name="first_name"
					placeholder="voornaam"
					value="{{ old('first_name') }}"
					required
					autofocus
				>
				
				<label for="first_name" class="form__label">
					Voornaam
				</label>
				
				@error('name')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="name"
					type="text"
					class="form__input for-family @error('name') is-invalid @enderror"
					name="name"
					placeholder="Achternaam"
					value="{{ old('name') }}"
					required
				>
				
				<label for="name" class="form__label">
					Naam
				</label>
				
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="birthday"
					type="date"
					class="form__input for-family @error('birthday') is-invalid @enderror"
					name="birthday"
					value="{{ old('birthday') }}"
					required
				>
				
				<label for="birthday" class="form__label">
					Geboortedatum
				</label>
				
				@error('birthday')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<h2>
				Enkele medische gegevens
			</h2>
			
			<div class="form__group">
				<input
					id="allergies"
					type="text"
					class="form__input for-family @error('allergies') is-invalid @enderror"
					name="allergies"
					placeholder="allergies"
					value="{{ old('allergies') }}"
				>
				
				<label for="allergies" class="form__label">
					allergies
				</label>
				
				@error('allergies')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="medicins"
					type="text"
					class="form__input for-family @error('medicins') is-invalid @enderror"
					name="medicins"
					placeholder="medicins"
					value="{{ old('medicins') }}"
				>
				
				<label for="medicins" class="form__label">
					medicins
				</label>
				
				@error('medicins')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="checkbox">
				<label class="checkbox__label">
					<input
						class="checkbox__input for-family"
						type="checkbox"
						name="hasTetanusShot"
						value="1"
					>
					<div class="checkbox__text">
						heeft een vaccinatie tegen tetanus gekregen
					</div>
				</label>
			</div>
			
			<div class="form__group">
				<input
					id="tetanus_date"
					type="date"
					class="form__input for-family @error('tetanus_date') is-invalid @enderror"
					name="tetanus_date"
					value="{{ old('tetanus_date') }}"
				>
				
				<label for="tetanus_date" class="form__label">
					Datum van de vaccinatie
				</label>
				
				@error('tetanus_date')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="doc_name"
					type="text"
					class="form__input for-family @error('doc_name') is-invalid @enderror"
					name="doc_name"
					placeholder="doc_name"
					value="{{ old('doc_name') }}"
					required
				>
				
				<label for="doc_name" class="form__label">
					doc_name
				</label>
				
				@error('doc_name')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="doc_phone_nr"
					type="text"
					class="form__input for-family @error('doc_phone_nr') is-invalid @enderror"
					name="doc_phone_nr"
					placeholder="doc_phone_nr"
					value="{{ old('doc_phone_nr') }}"
					required
				>
				
				<label for="doc_phone_nr" class="form__label">
					doc_phone_nr
				</label>
				
				@error('doc_phone_nr')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<h2>
				Extra informatie
			</h2>
			
			<div class="checkbox">
				<label class="checkbox__label">
					<input
						class="checkbox__input for-family"
						type="checkbox"
						name="canSwim"
						value="1"
					>
					<div class="checkbox__text">
						kan zwemmen
					</div>
				</label>
			</div>
			
			<div class="form__group">
				<input
					id="info"
					type="text"
					class="form__input for-family @error('info') is-invalid @enderror"
					name="info"
					placeholder="info"
					value="{{ old('info') }}"
				>
				
				<label for="info" class="form__label">
					info
				</label>
				
				@error('info')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__actions">
				<button type="submit" class="btn for-family">
					Schrijf jouw kind in
				</button>
			</div>
		
		</form>
	</div>
@endsection