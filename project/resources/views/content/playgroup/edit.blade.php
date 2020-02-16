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
			Bewerk speelgroep {{ $playgroup['name'] }}
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('playgroup.postEdit', ['playgroup_id' => $playgroup['id']]) }}"
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
					value="{{ $playgroup['name'] }}"
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
				>{{ $playgroup['description'] }}</textarea>
				
				<label for="description" class="form__label">
					Beschrijving
				</label>
				
				@error('description')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="row">
				<div class="form__group grow">
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
				
				@if($playgroup['image'] && File::exists(public_path() . "/images/playgroup/" . $playgroup['image']))
					<div class="ctn-image is-small">
						<img src="{{ asset('/images/playgroup/' . $playgroup['image'] ) }}" alt="{{ $playgroup['name'] }}" loading="lazy">
					</div>
				@endif
			</div>
			
			<div class="account__section">
				<h2 class="account__subheading">
					Leeftijd
				</h2>
				<p>
					Om de kinderen te verdelen in de speelgroepen
				</p>
				
				<div class="form__group">
					<input
						id="minAge"
						type="number"
						step="0.5"
						class="form__input for-admin @error('minAge') is-invalid @enderror"
						name="minAge"
						placeholder="Bv. 2, 7 of 3"
						value="{{ $playgroup['minAge'] }}"
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
						type="number"
						step="0.5"
						class="form__input for-admin @error('maxAge') is-invalid @enderror"
						name="maxAge"
						placeholder="Bv. 2, 7 of 3"
						value="{{ $playgroup['maxAge'] }}"
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
			</div>
			
			
			<div class="form__actions">
				<button type="submit" class="btn for-admin">
					Bewerk gegevens van speelgroep {{ $playgroup['name'] }}
				</button>
			</div>
		</form>
	</div>
@endsection