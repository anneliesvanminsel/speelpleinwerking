@extends('layouts.admin')
@section('title')
	Leiding - kinderen
@endsection

@section('content')
	<div>
		<div class="row section">
			<h1 class="grow">
				Overzicht kinderen
			</h1>
			<div>
				{{ App\Kid::with("days")->has('days')->count() }} / {{ config('global.max_kids') }}
			</div>
		</div>
		
		<form action="{{ route('kid.search') }}" method="GET" class="search section">
			<div class="row">
				<div class="form__group grow">
					<input
						type="text"
						name="search"
						class="form__input for-admin"
						value="{{ $oldSearch }}"
						placeholder="Voor- of achternaam"
					>
					<label for="search" class="form__label">
						Naam van het kind
					</label>
				</div>
				<button type="submit" class="btn is-small for-admin">
					Zoek
				</button>
			</div>
		</form>
		
		<div class="section">
			<div class="account__section card--container">
				@if($kids->count() > 0)
					@foreach($kids as $kid)
						@include('cards.kid', ['kid' => $kid])
					@endforeach
				@else
					<div>
						Geen kind(eren) gevonden met deze naam.
					</div>
				@endif
			</div>
		</div>
		
	</div>
@endsection