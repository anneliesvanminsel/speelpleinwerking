@extends('layouts.admin')
@section('title')
	Nieuwe hoofdleiding
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
				Maak een hoofdleiding van {{ $monitor->first_name }} {{ $monitor->name }}
			</h1>
			<div>
				Inloggegevens en adresgegevens zijn ongewijzigd. <br>
				Controleer hieronder de basisgegevens en voeg eventuele extra gegevens toe.
			</div>
		</div>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('admin.postCreate', ['monitor_id' => $monitor['id']]) }}"
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
						class="form__input for-admin @error('image') is-invalid @enderror"
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
						class="form__input for-admin @error('name') is-invalid @enderror"
						name="first_name"
						placeholder="voornaam"
						value="{{ $monitor['first_name'] }}"
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
						class="form__input for-admin @error('name') is-invalid @enderror"
						name="name"
						placeholder="Achternaam"
						value="{{ $monitor['name'] }}"
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
						class="form__input for-admin @error('birthday') is-invalid @enderror"
						name="birthday"
						value="{{ $monitor['birthday'] }}"
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
						class="form__input for-admin @error('phone_nr') is-invalid @enderror"
						name="phone_nr"
						placeholder="GSM-nummer: 04.."
						value="{{ $monitor['phone_nr'] }}"
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
						class="form__input for-admin @error('allergies') is-invalid @enderror"
						name="allergies"
						placeholder="allergies"
						value="{{$monitor['allergies'] }}"
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
							class="checkbox__input for-admin"
							type="checkbox"
							name="isVeggie"
							value="1"
							{{ $monitor['isVeggie'] == 1 ? 'checked' : '' }}
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
						class="form__input for-admin @error('extra_info') is-invalid @enderror"
						name="extra_info"
						placeholder="extra_info"
						value="{{ $monitor['extra_info'] }}"
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
			<div class="article">
				<h2 class="article__title">
					Introductietekst
				</h2>
				<div>
					Op de website verschijnen de namen van de verschillende leden van de hoofdleiding.
					Hierbij hoort ook een soort introductietekstje. <br>
					Deze kan je hieronder neerschrijven. Je kan dit later natuurlijk ook zelf bewerken.
				</div>
				
				<div class="form__group">
					<input
						id="introtext"
						type="text"
						class="form__input for-admin @error('introtext') is-invalid @enderror"
						name="introtext"
						placeholder="Stel jezelf voor"
						value="{{ old('introtext') }}"
					>
					
					<label for="introtext" class="form__label">
						Introductietekst
					</label>
					
					@error('introtext')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="article form__actions">
				<button type="submit" class="btn for-admin">
					Sla de wijzigingen aan jouw gegevens op
				</button>
			</div>
		</form>
	</div>
@endsection