@extends('layouts.moni')
@section('title')
	Mijn account - {{$contact['first_name']}} {{$contact['name']}} bewerken
@endsection

@section('content')
	<div class="section">
		<div class="breadcrumb">
			<a href="{{ route('account', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
				@svg('back') Terug
			</a>
		</div>
		
		<h1>
			Gegevens van contactpersoon, {{ $contact['first_name'] }} {{ $contact['name'] }} bewerken
		</h1>
	</div>
	
	<form method="POST" action="{{ route('contact.postEdit', ['contact_id' => $contact['id']]) }}" class="form" enctype="multipart/form-data">
		@csrf
		<div class="article">
			<div class="form__group">
				<input
					id="image"
					type="file"
					class="form__input for-volunteer @error('image') is-invalid @enderror"
					name="image"
					value="{{ old('image') }}"
				>
				
				<label for="image" class="form__label">
					Foto (optioneel)
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
					class="form__input for-volunteer @error('first_name') is-invalid @enderror"
					name="first_name"
					placeholder="bv. Jan, Elisa"
					value="{{ $contact['first_name'] }}"
					required
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
					placeholder="achternaam"
					value="{{ $contact['name'] }}"
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
					id="role"
					type="text"
					class="form__input for-volunteer @error('role') is-invalid @enderror"
					name="role"
					placeholder="bv. moeder, oom, begeleid(st)er, ..."
					value="{{ $contact['role'] }}"
					required
				>
				<label for="role" class="form__label">
					Rol
				</label>
				
				@error('role')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		
		<div class="article">
			<h2 class="article__title">
				Contactgegevens
			</h2>
			
			<div class="form__group">
				<input
					id="phone_nr"
					type="text"
					class="form__input for-volunteer @error('phone_nr') is-invalid @enderror"
					name="phone_nr"
					placeholder="telefoonnummer in geval van nood"
					value="{{ $contact['phone_nr'] }}"
					required
				>
				<label for="phone_nr" class="form__label">
					Telefoonnummer
				</label>
				
				@error('phone_nr')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="mailaddress"
					type="email"
					class="form__input for-volunteer @error('mailaddress') is-invalid @enderror"
					name="mailaddress"
					placeholder="jan.peeters@mail.be"
					value="{{ $contact['mailaddress'] }}"
					required
				>
				<label for="mailaddress" class="form__label">
					mailadres
				</label>
				
				@error('mailaddress')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="spacing-top-m">
				<button type="submit" class="btn for-volunteer">
					Sla de wijzigingen van contactpersoon, {{ $contact['first_name'] }} {{ $contact['name'] }}, op
				</button>
			</div>
		</div>
	</form>
@endsection