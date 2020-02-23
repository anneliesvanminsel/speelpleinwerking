@extends('layouts.app')
@section('title')
	Mijn account - Kind {{ $kid['first_name'] }} bewerken
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			Gegevens van jouw kind, {{ $kid['first_name'] }}, bewerken
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('kid.postEdit', ['kid_id' => $kid['id']]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			<h2>
				Algemene gegevens
			</h2>
			
			<div class="form__group">
				<input
					id="image"
					type="file"
					class="form__input for-family @error('image') is-invalid @enderror"
					name="image"
					value="{{ old('image') }}"
				>
				
				<label for="image" class="form__label">
					Foto van jouw kind (optioneel)
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
					value="{{ $kid['first_name'] }}"
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
					value="{{ $kid['name'] }}"
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
					value="{{ $kid['birthday'] }}"
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
				Medische gegevens
			</h2>
			
			<h3>
				Heeft het kind allergieën?
			</h3>
			<div class="form__group">
				<input
					id="allergies"
					type="text"
					class="form__input for-family @error('allergies') is-invalid @enderror"
					name="allergies"
					placeholder="allergies"
					value="{{ $kid['allergies'] }}"
				>
				
				<label for="allergies" class="form__label">
					Waaraan is het kind allergisch?
				</label>
				
				@error('allergies')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<h3>
				Neemt het kind medicatie?
			</h3>
			
			<div class="form__group">
				<input
					id="medicins"
					type="text"
					class="form__input for-family @error('medicins') is-invalid @enderror"
					name="medicins"
					placeholder="medicins"
					value="{{ $kid['medicins'] }}"
				>
				
				<label for="medicins" class="form__label">
					Welke medicatie?
				</label>
				
				@error('medicins')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<h3>
				Tetanus vaccinatie
			</h3>
			<div class="checkbox">
				<label class="checkbox__label">
					<input
						class="checkbox__input for-family"
						type="checkbox"
						name="hasTetanusShot"
						value="1"
						{{ $kid['hasTetanusShot'] == 1 ? 'checked' : '' }}
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
					value="{{ $kid['tetanus_date'] }}"
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
			
			<h3>
				Gegevens van de huisarts
			</h3>
			
			<div class="form__group">
				<input
					id="doc_name"
					type="text"
					class="form__input for-family @error('doc_name') is-invalid @enderror"
					name="doc_name"
					placeholder="doc_name"
					value="{{ $kid['doc_name'] }}"
					required
				>
				
				<label for="doc_name" class="form__label">
					Naam van de huisarts
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
					value="{{ $kid['doc_phone_nr'] }}"
					required
				>
				
				<label for="doc_phone_nr" class="form__label">
					Telefoonnummer van de huisarts
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
						{{ $kid['canSwim'] == 1 ? 'checked' : '' }}
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
					value="{{ $kid['info'] }}"
				>
				
				<label for="info" class="form__label">
					Wil je ons nog iets meedelen?
				</label>
				
				@error('info')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__actions">
				<button type="submit" class="btn for-family">
					Sla de wijzigingen voor jouw kind, {{ $kid['first_name'] }}, op.
				</button>
			</div>
		
		</form>
	</div>
@endsection