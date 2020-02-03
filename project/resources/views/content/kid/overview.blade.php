@extends('layouts.admin')
@section('title')
	Leiding - kinderen
@endsection

@section('content')
	<div class="section">
		<div class="row">
			<h1>
				Overzicht kinderen
			</h1>
		</div>
		
		<div class="account__section card--container">
			@foreach($kids as $kid)
				@include('cards.kid', ['kid' => $kid])
			@endforeach
		</div>
	</div>
@endsection