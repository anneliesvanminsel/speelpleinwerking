@extends('layouts.app')
@section('title')
	Mijn account - adresgegevens toevoegen
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		
		<h1>
			Voeg adresgegevens van jouw familie of organisatie toe
		</h1>
		
		
		<form method="POST" action="{{ route('family.postCreateAddress') }}" class="form" enctype="multipart/form-data">
			@csrf
			
			<div class="form__group">
				<input
					id="street"
					type="text"
					class="form__input for-family @error('street') is-invalid @enderror"
					name="street"
					placeholder="bv. Tervuursesteenweg"
					value="{{ old('street') }}"
					required
				>
				<label for="street" class="form__label">
					Straatnaam
				</label>
				
				@error('street')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="row row--stretch">
				<div class="form__group">
					<input
						id="streetnumber"
						type="text"
						class="form__input for-family @error('streetnumber') is-invalid @enderror"
						name="streetnumber"
						placeholder="huisnummer"
						value="{{ old('streetnumber') }}"
						required
					>
					<label for="streetnumber" class="form__label">
						Nummer
					</label>
					
					@error('streetnumber')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						id="box"
						type="text"
						class="form__input for-family @error('box') is-invalid @enderror"
						name="box"
						placeholder="busnummer"
						value="{{ old('box') }}"
					>
					<label for="box" class="form__label">
						Bus
					</label>
					
					@error('box')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="form__group">
				<input
					id="postalcode"
					type="text"
					class="form__input for-family @error('postalcode') is-invalid @enderror"
					name="postalcode"
					placeholder="tussen 1000 en 9999"
					value="{{ old('postalcode') }}"
					required
				>
				<label for="postalcode" class="form__label">
					Postcode
				</label>
				
				@error('postalcode')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="city"
					type="text"
					class="form__input for-family @error('city') is-invalid @enderror"
					name="city"
					placeholder="Bv. Leuven, Brussel, etc."
					value="{{ old('city') }}"
					required
				>
				<label for="city" class="form__label">
					Gemeente
				</label>
				
				@error('city')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="spacing-top-m">
				<button type="submit" class="btn for-family">
					Voeg jouw adres toe
				</button>
			</div>
		</form>
	</div>
@endsection