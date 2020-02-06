@extends('layouts.admin')
@section('title')
	Leiding - Sponsors
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('sponsor.overview') }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		<h1>
			Bewerk sponsor {{ $sponsor['name'] }}
		</h1>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('sponsor.postEdit', ['sponsor_id' => $sponsor->id]) }}"
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
					value="{{ $sponsor['name'] }}"
					required
					autofocus
					autocomplete="off"
				>
				
				<label for="name" class="form__label">
					Naam van de sponsor
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
					id="information"
					class="form__input for-admin @error('information') is-invalid @enderror"
					name="information"
					placeholder="Een beschrijving van de speelgroep."
					required
					maxlength="255"
				>{{ $sponsor['information'] }}</textarea>
				
				<label for="information" class="form__label">
					Informatie over de sponsoring
				</label>
				
				@error('information')
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
			
			
			<div class="form__group">
				<input
					id="link"
					type="text"
					class="form__input for-admin @error('link') is-invalid @enderror"
					name="link"
					placeholder="Website van sponsor"
					value="{{ $sponsor['link'] }}"
					autocomplete="off"
				>
				
				<label for="link" class="form__label">
					Link naar website van sponsor
				</label>
				
				@error('link')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			
			<div class="form__actions">
				<button type="submit" class="btn for-admin">
					Bewerk gegevens van {{ $sponsor['name'] }}
				</button>
			</div>
		</form>
	</div>
@endsection