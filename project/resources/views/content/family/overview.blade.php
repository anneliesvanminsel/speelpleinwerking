@extends('layouts.admin')
@section('title')
	Leiding - families
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht families
			</h1>
		</div>
		
		<form action="{{ route('family.search') }}" method="GET" class="search">
			<div class="form__group">
				<input
					type="text"
					name="search"
					class="form__input for-admin"
					placeholder="mailadres"
					value="{{ $oldSearch }}"
					onchange="this.form.submit()"
				>
				<label for="search" class="form__label">
					Zoek op mailadres
				</label>
			</div>
		</form>

		
		<div class="card--container is-overview">
			@foreach($users as $user)
				@include('cards.family', ['user' => $user])
			@endforeach
		</div>
	</div>
@endsection