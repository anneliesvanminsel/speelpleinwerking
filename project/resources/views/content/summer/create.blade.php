@extends('layouts.admin')
@section('title')
	Nieuwe zomer!
@endsection

@section('content')
	<div>
		<div class="section">
			<div class="breadcrumb">
				<a href="{{ route('admin.dashboard', ['user_id' => Auth::id()]) }}" class="breadcrumb__link">
					@svg('back') Terug
				</a>
			</div>
			<h1>
				Start een nieuwe zomer!
			</h1>
		</div>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('admin.postNewSummer') }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="article">
				<div class="form__group">
					<input
						id="startdate"
						type="date"
						class="form__input for-admin @error('startdate') is-invalid @enderror"
						name="startdate"
						value="{{ old('startdate') }}"
						required
					>
					
					<label for="startdate" class="form__label">
						Start datum van de zomer
					</label>
					
					@error('startdate')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						id="enddate"
						type="date"
						class="form__input for-admin @error('enddate') is-invalid @enderror"
						name="enddate"
						value="{{ old('enddate') }}"
						required
					>
					
					<label for="enddate" class="form__label">
						Eind datum van de zomer
					</label>
					
					@error('enddate')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						id="maxVolunteers"
						type="number"
						class="form__input for-admin @error('maxVolunteers') is-invalid @enderror"
						name="maxVolunteers"
						placeholder="8"
						value="{{ old('maxVolunteers') }}"
						required
					>
					
					<label for="maxVolunteers" class="form__label">
						Max aantal monitoren
					</label>
					
					@error('maxVolunteers')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			
			
			<div class="article form__actions">
				<button type="submit" class="btn for-admin">
					Start de zomer!
				</button>
			</div>
		
		</form>
	</div>
@endsection