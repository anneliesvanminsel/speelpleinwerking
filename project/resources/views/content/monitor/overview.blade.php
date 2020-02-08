@extends('layouts.admin')
@section('title')
	Leiding - vrijwilligers
@endsection

@section('content')
	<div>
		<div class="section">
			<h1>
				Overzicht monitoren
			</h1>
		</div>
		
		<form action="{{ route('monitor.search') }}" method="GET" class="search section">
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
						Naam van de monitor
					</label>
				</div>
				<button type="submit" class="btn is-small for-admin">
					Zoek
				</button>
			</div>
		</form>
		
		<div class="article card--container">
			@if($monitoren->count() > 0)
				@foreach($monitoren as $moni)
					@include('cards.monitor', ['moni' => $moni])
				@endforeach
			@else
				<div>
					Geen monitor(en) gevonden met deze naam.
				</div>
			@endif
		</div>
	</div>
@endsection