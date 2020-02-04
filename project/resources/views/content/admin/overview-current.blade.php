@extends('layouts.admin')
@section('title')
	Leiding - huidige hoofdleiding
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1 class="grow">
				Overzicht huidige hoofdleiding
			</h1>
			<a href="{{ route('faq.create') }}" class="btn is-small for-admin">
				voeg nieuw toe
			</a>
		</div>
		
		<div class="account__section card--container">
			@foreach($admins as $admin)
				@include('cards.admin', ['admin' => $admin])
			@endforeach
		</div>
	</div>
@endsection