@extends('layouts.moni')
@section('title')
	Mijn gegevens toevoegen
@endsection

@section('content')
	<div>
		<div class="section">
			<div class="breadcrumb">
				<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
					@svg('back') Terug
				</a>
			</div>
			<h1>
				Voeg jouw gegevens toe
			</h1>
		</div>
		
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('monitor.postCreate', ['user_id' => Auth::id()]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="article">
				<h2 class="article__title">
					Algemene gegevens
				</h2>
				
				<div class="form__group">
					<input
						id="image"
						type="file"
						class="form__input for-volunteer @error('image') is-invalid @enderror"
						name="image"
						value="{{ old('image') }}"
					>
					
					<label for="image" class="form__label">
						Pasfoto (optioneel)
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
						class="form__input for-volunteer @error('name') is-invalid @enderror"
						name="first_name"
						placeholder="voornaam"
						value="{{ old('first_name') }}"
						required
						autofocus
					>
					
					<label for="first_name" class="form__label">
						Voornaam
					</label>
					
					@error('first_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						id="name"
						type="text"
						class="form__input for-volunteer @error('name') is-invalid @enderror"
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
						class="form__input for-volunteer @error('birthday') is-invalid @enderror"
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
				
				<div class="form__group">
					<input
						id="phone_nr"
						type="text"
						class="form__input for-volunteer @error('phone_nr') is-invalid @enderror"
						name="phone_nr"
						placeholder="GSM-nummer: 04.."
						value="{{ old('phone_nr') }}"
						required
					>
					
					<label for="phone_nr" class="form__label">
						GSM-nummer
					</label>
					
					@error('phone_nr')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="article">
				<h2 class="article__title">
					Medische gegevens
				</h2>
				
				<h3 class="article__subtitle">
					Ben jij ergens allergisch aan?
				</h3>
				<div class="form__group">
					<input
						id="allergies"
						type="text"
						class="form__input for-volunteer @error('allergies') is-invalid @enderror"
						name="allergies"
						placeholder="allergies"
						value="{{ old('allergies') }}"
					>
					
					<label for="allergies" class="form__label">
						Waaraan ben jij allergisch?
					</label>
					
					@error('allergies')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="article">
				<h2 class="article__title">
					Extra informatie
				</h2>
				
				<div class="checkbox">
					<label class="checkbox__label">
						<input
							class="checkbox__input for-volunteer"
							type="checkbox"
							name="isVeggie"
							value="1"
						>
						<div class="checkbox__text">
							Ik ben vegetarisch
						</div>
					</label>
				</div>
				<br>
				<div class="form__group">
					<input
						id="extra_info"
						type="text"
						class="form__input for-volunteer @error('extra_info') is-invalid @enderror"
						name="extra_info"
						placeholder="extra_info"
						value="{{ old('extra_info') }}"
					>
					
					<label for="extra_info" class="form__label">
						Wil je ons nog iets meedelen?
					</label>
					
					@error('extra_info')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="article form__actions">
				<button type="submit" class="btn for-volunteer">
					Sla jouw gegevens op
				</button>
			</div>
		
		</form>
	</div>
@endsection